<?php

include('../db.php');

$id = $_GET['id'];

/* Consulta de la base de datos */
$query ="DELETE FROM usuarios WHERE id_usuario=$id";
if($conn->query($query)==TRUE){
    header('Location: ..//controlusuarios.php');
}else {
    echo "Error de consulta";
}


?>