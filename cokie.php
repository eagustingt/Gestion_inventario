<?php

if(isset($_POST['email'])){
    $nombre=$_POST['email'];
    setcookie("usuarioCookie", $nombre, time() +20, "/"  );
    
}


header("location: login2.php");
exit();
?>