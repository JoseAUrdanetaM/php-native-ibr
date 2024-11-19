<?php
$conn = new mysqli("localhost", "root", "", "ibr_api");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = '';
$name = '';
$phone = '';
$email = '';
$company_name = '';
$street = '';
$lat = '';
$lng = '';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM users WHERE id = $id");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $name = $user['name'];
        $phone = $user['phone'];
        $email = $user['email'];
        $company_name = $user['company_name'];
        $street = $user['street'];
        $lat = $user['lat'];
        $lng = $user['lng'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $company_name = $_POST['company_name'];
    $street = $_POST['street'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    if ($id) {
        $sql = "UPDATE users SET name='$name', phone='$phone', email='$email', 
                company_name='$company_name', street='$street', lat='$lat', lng='$lng' 
                WHERE id=$id";
    } else {
        $sql = "INSERT INTO users (name, phone, email, company_name, street, lat, lng)
                VALUES ('$name', '$phone', '$email', '$company_name', '$street', '$lat', '$lng')";
    }

    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario Usuario</title>
</head>

<a href="index.php">Volver</a>

<body>
    <form method="POST">
        <input type="text" name="name" value="<?= $name ?>" placeholder="Nombre" required><br>
        <input type="text" name="phone" value="<?= $phone ?>" placeholder="Teléfono"><br>
        <input type="email" name="email" value="<?= $email ?>" placeholder="Correo" required><br>
        <input type="text" name="company_name" value="<?= $company_name ?>" placeholder="Compañía"><br>
        <input type="text" name="street" value="<?= $street ?>" placeholder="Calle"><br>
        <input type="text" name="lat" value="<?= $lat ?>" placeholder="Latitud"><br>
        <input type="text" name="lng" value="<?= $lng ?>" placeholder="Longitud"><br>
        <button type="submit">Guardar</button>

    </form>
</body>

</html>