<?php
$conn = new mysqli("localhost", "root", "", "ibr_api");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Usuarios</title>
</head>

<body>
    <h1>Usuarios</h1>
    <a href="fetch_data.php">Consumir API</a>
    <a href="form.php">Agregar Usuario</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Compañía</th>
            <th>Calle</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['company_name'] ?></td>
                <td><?= $row['street'] ?></td>
                <td><?= $row['lat'] ?></td>
                <td><?= $row['lng'] ?></td>
                <td>
                    <a href="form.php?id=<?= $row['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $row['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>