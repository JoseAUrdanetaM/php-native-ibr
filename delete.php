<?php
$conn = new mysqli("localhost", "root", "", "ibr_api");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM users WHERE id = $id");
}

header("Location: index.php");
