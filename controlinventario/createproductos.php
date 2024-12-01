<?php
include('../db.php');


if (isset($_POST['submit'])){

    //$id_producto = $_POST['id_producto'];
    $producto = $_POST['producto'];
    $descripción = $_POST['descripción'];
    $cantidad = $_POST['cantidad'];
    $precio_unitario = $_POST['precio_unitario'];
    $categoría = $_POST['categoría'];
    $proveedor = $_POST['proveedor'];
    $estado = $_POST['estado'];

    
  


  $query = "INSERT INTO inventario( producto, descripción, cantidad, precio_unitario, id_categoria, id_proveedor,estado)
            VALUES ('$producto',' $descripción',$cantidad,$precio_unitario,$categoría,$proveedor,'$estado')";

  if($conn->query($query)==TRUE){
    header('Location: ../nuevoproducto.php');
  }else{
    
    echo "Error de procedimientos de ingreso de datos";
  }
}


?>