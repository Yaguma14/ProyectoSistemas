<?php
session_start();
include 'conexion.php';  // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    // Verificar las credenciales del usuario
    $stmt = $conexion->prepare("SELECT id, contraseña, rol FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Obtener datos del usuario
        $stmt->bind_result($id, $contraseña_hash, $rol_obtenido);
        $stmt->fetch();

        if (password_verify($contraseña, $contraseña_hash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['rol'] = $rol_obtenido;

            // Redirigir según el rol
            if ($rol_obtenido == 'administrador') {
                header("Location:crud-php/index.php");
            } elseif ($rol_obtenido == 'estudiante') {
                header("Location:dashboard_estudiante.php");
            }
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
    $conexion->close();
}
?>
