<?php

include('../db.php');

$id = $_GET['id'];

/* Consulta de la base de datos */
$query ="DELETE FROM categorias WHERE id_categoria=$id";
if($conn->query($query)==TRUE){
    header('Location: ..//controlCategoria.php');
}else {
    echo "Error de consulta";
}


?>