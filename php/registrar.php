<?php
require "conexion.php";

$nombre = $_POST['nombre'];
$email  = $_POST['email'];
$pass   = password_hash($_POST['password'], PASSWORD_DEFAULT);

$check = $conexion->prepare("SELECT email FROM usuarios WHERE email=?");
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "El correo ya está registrado";
    exit;
}

$stmt = $conexion->prepare("INSERT INTO usuarios(nombre, email, password) VALUES(?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $pass);

if ($stmt->execute()) {
    header("Location: ../tutorial.html");
    exit();
} else {
    echo "Error al registrar";
}
?>
