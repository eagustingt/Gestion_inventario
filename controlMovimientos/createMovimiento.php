<?php
include('../db.php');


if (isset($_POST['submit'])){

    //$id_producto = $_POST['id_producto'];
    $producto = $_POST['producto'];
    $tipo_movimiento = $_POST['tipo_movimiento'];
    $cantidad = $_POST['cantidad'];
    $observacion = $_POST['observacion'];
 
    //echo $producto. $tipo_movimiento.$cantidad.$observacion;

     


  $query = "INSERT INTO movimientos( id_producto, tipo_movimiento, cantidad, observacion)
  VALUES ($producto,'$tipo_movimiento',$cantidad, '$observacion')";

if($conn->query($query)==TRUE){
header('Location: ../nuevomovimiento.php');
}else{

echo "Error de procedimientos de ingreso de datos";
}
  


 
}


?>