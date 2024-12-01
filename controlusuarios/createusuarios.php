<?php
include('../db.php');


if (isset($_POST['submit'])){

    $name = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];


  $query = "INSERT INTO usuarios(email,contraseña,telefono)
            VALUES ('$name','$password',' $phone')";


    $id = $_GET['id'];
  if($conn->query($query)==TRUE){
   
    header('Location: ../controlusuarios.php');
  }else{
    
    echo "Error de conexión";
  }
}


?>