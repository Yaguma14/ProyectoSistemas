<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["correo"]) and  !empty($_POST["contraseña"]) and !empty($_POST["rol"]) and !empty($_POST["numero_identificacion"]) and !empty($_POST["fecha_nacimiento"]) and !empty($_POST["curso"])) {
        
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $contraseña = $_POST["contraseña"];
        $rol = $_POST["rol"];
        $numero_identificacion = $_POST["numero_identificacion"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $curso = $_POST["curso"];

        $sql = $conexion->query(" insert into usuarios(nombre, apellido, correo, contraseña, rol, numero_identificacion, fecha_nacimiento, curso) values ('$nombre','$apellido','$correo','$contraseña','$rol','$numero_identificacion','$fecha_nacimiento','$curso')");

        if ($sql==1) {
            echo '<div class="alert alert-success">Usuario registrado correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar usuario.</div>';
        }
        

    } else {
        echo '<div class="alert alert-warning">Por favor, rellena todos los campos.</div>';
    }
}

?>