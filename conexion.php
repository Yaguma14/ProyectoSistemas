<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "sistema_votaciones";  // Nombre de la base de datos

$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar si hay error de conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
