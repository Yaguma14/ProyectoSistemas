<?php

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    
    $sql = $conexion->query(" delete from usuarios where id = $id ");

    if($sql==1){
        echo '<div class="alert alert-success">Usuario eliminado correctamente.</div>';
    }else{
        echo '<div class="alert alert-danger">Error al eliminar.</div>';
    }
}

?>