<?php
include 'conexion.php';  // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);  // Encriptar la contraseña
    $rol = $_POST['rol'];

    // Verificar si el usuario ya está registrado
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "Este correo ya está registrado.";
    } else {
        // Insertar el nuevo usuario
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $correo, $contraseña, $rol);
        if ($stmt->execute()) {
            // Redirigir al inicio de sesión
            header("Location: index.php");
            exit();
        } else {
            echo "Error al registrar usuario.";
        }
    }
    $stmt->close();
    $conexion->close();
}
?>
