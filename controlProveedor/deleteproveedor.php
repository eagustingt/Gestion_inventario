<?php

include('../db.php');

$id = $_GET['id'];

/* Consulta de la base de datos */
$query ="DELETE FROM proveedores WHERE id_proveedor=$id";
if($conn->query($query)==TRUE){
    header('Location: ..//controlProveedor.php');
}else {
    echo "Error de consulta";
}


?>