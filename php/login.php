<?php
require "conexion.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email=? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Verificar contraseña
    if (password_verify($password, $row['password'])) {
        header("Location: ../tutorial.html");
        exit();
        
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "No existe una cuenta con ese correo";
}
?>
