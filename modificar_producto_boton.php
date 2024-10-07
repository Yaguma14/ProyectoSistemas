<?php

if (!empty($_POST["btnModificar"])){
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["correo"]) and !empty($_POST["contraseña"]) and !empty($_POST["rol"]) and !empty($_POST["numero_identificacion"]) and !empty($_POST["fecha_nacimiento"]) and !empty($_POST["curso"])) {
        
    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $correo=$_POST["correo"];
    $contraseña=$_POST["contraseña"];
    $rol=$_POST["rol"];
    $numero_identificacion=$_POST["numero_identificacion"];
    $fecha_nacimiento=$_POST["fecha_nacimiento"];
    $curso=$_POST["curso"];

    $sql=$conexion->query("update usuarios set nombre ='$nombre', apellido ='$apellido', correo = '$correo', contraseña = '$contraseña', rol = '$rol', numero_identificacion = '$numero_identificacion', fecha_nacimiento = '$fecha_nacimiento', curso = '$curso' where id = $id");

    if ($sql==1) {
        header("location:index.php");
    } else {
        echo "<div class='alert alert-danger'>Error al modificar producto.</div>";
    }
    

    }else {
        echo "<div class='alert alert-warning'>Rellene los campos vacíos.</div>";
    }
}

?>