<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aacd7fb5fd.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function eliminar(){
            var respuesta = confirm("¿Está seguro que desea eliminar este usuario?");
            return respuesta
        }
    </script>
    <h1 class="text-center p-3">Gestión de Usuarios</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_persona.php";
    ?>
    <div class="container-fluid row">
        <form class="col-3 p-7" method="POST">
            <h3 class="text-center text-secondary">Registro de Usuarios</h3>
            <?php
            include "controlador/registro_usuario.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre(s)</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Apellido(s)</label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Correo electrónico</label>
                <input type="text" class="form-control" name="correo">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="text" class="form-control" name="contraseña">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Rol</label>
                <input type="text" class="form-control" name="rol">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Número de identificación</label>
                <input type="text" class="form-control" name="numero_identificacion">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Curso</label>
                <input type="text" class="form-control" name="curso">
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="Ok">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE(S)</th>
                        <th scope="col">APELLIDO(S)</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">CONTRASEÑA</th>
                        <th scope="col">ROL</th>
                        <th scope="col">NUM IDENTIFICACION</th>
                        <th scope="col">FECHA NACIMIENTO</th>
                        <th scope="col">CURSO</th>
                        <th scope="col">FECHA REGISTRO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include "modelo/conexion.php";
                    $sql = $conexion->query(" select * from usuarios ");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id?></td>
                            <td><?= $datos->nombre?></td>
                            <td><?= $datos->apellido?></td>
                            <td><?= $datos->correo?></td>
                            <td><?= $datos->contraseña?></td>
                            <td><?= $datos->rol?></td>
                            <td><?= $datos->numero_identificacion?></td>
                            <td><?= $datos->fecha_nacimiento?></td>
                            <td><?= $datos->curso?></td>
                            <td><?= $datos->fecha_registro?></td>
                            <td>
                                <a href="modificar_usuario.php?id=<?= $datos->id?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>