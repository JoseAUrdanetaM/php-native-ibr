<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ibr_api");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consumir datos del API
$url = "https://jsonplaceholder.typicode.com/users";
$data = json_decode(file_get_contents($url), true);

foreach ($data as $user) {
    $name = $user['name'];
    $phone = $user['phone'];
    $email = $user['email'];
    $company_name = $user['company']['name'];
    $street = $user['address']['street'];
    $lat = $user['address']['geo']['lat'];
    $lng = $user['address']['geo']['lng'];

    $sql = "INSERT INTO users (name, phone, email, company_name, street, lat, lng)
            VALUES ('$name', '$phone', '$email', '$company_name', '$street', '$lat', '$lng')";

    $conn->query($sql);
}

echo "Datos importados correctamente.";
$conn->close();

?>

<!DOCTYPE html>
<html>

<body>
    <a href="index.php">Volver</a>
</body>

</html>