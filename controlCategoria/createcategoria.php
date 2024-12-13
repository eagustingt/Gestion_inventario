<?php
include('../db.php');


if (isset($_POST['submit'])){

    $nombre_categoria = $_POST['nombre_categoria'];
    $descripcion_categoria = $_POST['descripcion_categoria'];
   


  $query = "INSERT INTO categorias( nombre_categoria, descripcion_categoria)
            VALUES            ( '$nombre_categoria','$descripcion_categoria')
            ";


    //$id = $_GET['id'];
  if($conn->query($query)==TRUE){
   
    header('Location: ../controlCategoria.php');
  }else{
    
    echo "Error de conexión";
  }
}


?>