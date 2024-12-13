<?php
include('../db.php');


if (isset($_POST['submit'])){

    $nombre_proveedor = $_POST['nombre_proveedor'];
    $telefono_proveedor = $_POST['telefono_proveedor'];
    $direccion_proveedor = $_POST['direccion_proveedor'];
   


  $query = "INSERT INTO proveedores ( nombre_proveedor, telefono_proveedor, direccion_proveedor)
            VALUES                  ( '$nombre_proveedor','$telefono_proveedor','$direccion_proveedor')
            ";


   
  if($conn->query($query)==TRUE){
   
    header('Location: ../controlProveedor.php');
  }else{
    
    echo "Error de conexión";
  }
}


?>