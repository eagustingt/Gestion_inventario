<?php
include('../db.php');


if (isset($_POST['submit'])){

    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id_rol = $_POST['id_rol'];


  $query = "INSERT INTO usuarios( nombre, usuario, contraseña,id_rol, email, telefono)
            VALUES            ( '$nombre','$usuario','$password','$id_rol','$email',' $phone')
            ";


    $id = $_GET['id'];
  if($conn->query($query)==TRUE){
   
    header('Location: ../controlusuarios.php');
  }else{
    
    echo "Error de conexión";
  }
}


?>