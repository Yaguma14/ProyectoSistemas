<?php
// Iniciar sesión y conexión a la base de datos
session_start();
include 'conexion.php';

// Verificar si el usuario está logueado como estudiante
if ($_SESSION['rol'] !== 'estudiante') {
    header("Location: index.php");
    exit();
}

// Mostrar publicaciones
$query = "SELECT * FROM publicaciones ORDER BY fecha_publicacion DESC";
$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Foro Estudiantil</title>
    <link rel="stylesheet" href="styleFORO.css"> <!-- Enlace a tus estilos -->
</head>
<body>
    <div class="foro-container">
        <h1>Foro Estudiantil</h1>
        
        <div class="publicaciones">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="publicacion">
                    <h2><?php echo $row['titulo']; ?></h2>
                    <p><?php echo $row['contenido']; ?></p>
                    <span>Publicado el: <?php echo $row['fecha_creacion']; ?></span>

                    <!-- Mostrar sección de comentarios -->
                    <div class="comentarios">
                        <h3>Comentarios:</h3>
                        <?php
                        $pub_id = $row['id'];
                        $comentarios = "SELECT * FROM comentarios WHERE publicacion_id = $pub_id";
                        $res_comentarios = $conexion->query($comentarios);
                        while ($coment = $res_comentarios->fetch_assoc()) { ?>
                            <p><?php echo $coment['comentario']; ?> - <em><?php echo $coment['fecha_comentario']; ?></em></p>
                        <?php } ?>
                        <!-- Formulario para agregar comentarios -->
                        <form action="agregar_comentario.php" method="POST">
                            <textarea name="comentario" placeholder="Escribe tu comentario"></textarea>
                            <input type="hidden" name="publicacion_id" value="<?php echo $pub_id; ?>">
                            <button type="submit">Comentar</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Sección de votaciones -->
        <div class="votaciones">
            <?php
            $query_votaciones = "SELECT * FROM votaciones WHERE estado = 'abierta'";
            $votacion = $conexion->query($query_votaciones)->fetch_assoc();

            if ($votacion) { ?>
                <h2>Votación: <?php echo $votacion['descripcion']; ?></h2>
                <form action="votar.php" method="POST">
                    <label><input type="radio" name="opcion" value="Opcion 1"> Opción 1</label>
                    <label><input type="radio" name="opcion" value="Opcion 2"> Opción 2</label>
                    <input type="hidden" name="votacion_id" value="<?php echo $votacion['id']; ?>">
                    <button type="submit">Votar</button>
                </form>
            <?php } else { ?>
                <p>Las votaciones se abrirán pronto</p>
            <?php } ?>
        </div>

        <a href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>
