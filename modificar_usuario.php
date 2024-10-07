<?php

include "modelo/conexion.php";

$id = $_GET["id"];

$sql = $conexion->query(" select * from usuarios where id=$id ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">Modificación de Usuarios</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"]?>">
        <?php
        include "controlador/modificar_producto_boton.php";
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre(s)</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Apellido(s)</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Correo electrónico</label>
                <input type="text" class="form-control" name="correo" value="<?= $datos->correo?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="text" class="form-control" name="contraseña" value="<?= $datos->contraseña?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Rol</label>
                <input type="text" class="form-control" name="rol" value="<?= $datos->rol?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Número de identificación</label>
                <input type="text" class="form-control" name="numero_identificacion" value="<?= $datos->numero_identificacion?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" value="<?= $datos->fecha_nacimiento?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Curso</label>
                <input type="text" class="form-control" name="curso" value="<?= $datos->curso?>">
            </div>
        <?php }
        ?>


        <button type="submit" class="btn btn-primary" name="btnModificar" value="Ok">Modificar usuario</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>