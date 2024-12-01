<?php

include('../db.php');

$id = $_GET['id'];

/* Consulta de la base de datos */
$query ="DELETE FROM inventario WHERE id_producto=$id";
if($conn->query($query)==TRUE){
    header('Location: ../eliminarproducto.php');
}else {
    echo "Error de consulta";
}


?>