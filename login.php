<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password =  $_POST['password'];

    //consulta para verificar usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$password'";
    $result = $conn->query($sql);


/*
    $mostrar = mysqli_fetch_array ($result);
    $id_rol= $mostrar['email'];
    $pass=$mostrar['contraseña'];

    echo "email= ",$id_rol;
    echo "contraseña= ",$pass;
*/

  
    if ($result->num_rows >0) {
        header("Location:  home.php");
        exit();

    } else {
        header("Location: home.php?error=1");
        exit();
    }

}
?>