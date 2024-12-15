<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   

<?php
session_start();
include('db.php');


//Asignacion a variables locales datos que vienen del POST desde el formulario
$email=$_POST['email'];
$password=$_POST['password'];

//echo "USUARIO  =  ",$usuario;
//echo "CONTRASEÑA = ",$contraseña;


$query= "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$password' ";
               
$result = mysqli_query($conn,$query);
$mostrar = mysqli_fetch_array ($result);
//se extrae solo el id del rol para su validacion
$id_rol= $mostrar['id_rol'];








/*

//Realizar consulta a la base de datos con base al usuario y contraseña recibido el signo ?es por seguridad para que sea solo los datos que vienen del post
$query= "SELECT * FROM users where usuario=? and contraseña=? LIMIT 1 ";
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $usuario, $contraseña);//esto es para seguridad es decir que solo reviba dos string 'SS'
$stmt->execute();
$result = $stmt->get_result();
//Se pasa la informacion del query a un array
$row = mysqli_fetch_array ($result);
//se extrae solo el id del rol para su validacion
$id_rol= $row['id_rol'];

*/



//valida si vienen datos de la base de datos para darle a la variable $_SESION un valor, ejemplo Acceso correcto,  success, true 
if($result->num_rows==1){
    $_SESSION['message'] = 'Acceso CORRECTO';
    $_SESSION['message_type'] = 'success';
    $_SESSION['redirect']=true;
    //valida el rol del usuario 
    $_SESSION['id_rol']=$id_rol;
    //crear cookie si el longin y usuario correcto  
    setcookie("usuarioCookie", $email, time() +2000, "/"  );
    

    
}else{
    $_SESSION['message'] = 'Acceso incorrecto Valide los datos ingresados';
    $_SESSION['message_type'] = 'danger';
    $_SESSION['redirect']=false;
}
 



$conn-> close();



?>


                                        <?php

                                        /* Funcion Session_start para poder utilizar las variables globales que vienen de login */
                                        
                                    

                                        /* valida los mensajes que genera el sesion start 'message' */
                                        if(isset($_SESSION['message'])) { ?>
                                            
                                            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                            <?= $_SESSION['message']?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                            
                                        <?php
                                        //valida el tipo de usuarios en este caso valida si es ==1 ADMINISTRADOR 
                                        if(isset($_SESSION['redirect']) && $_SESSION['redirect']==true && $_SESSION['id_rol']==1)   {?>

                                            <script>
                                            setTimeout(function(){
                                            window.location.href="home.php"
                                            },1000);
                                            </script>

                                            
                                        <?php } 
                                        //valida el tipo de usuarios en este caso valida si es ==2 SUPERVISOR -->
                                        if(isset($_SESSION['redirect']) && $_SESSION['redirect']==true && $_SESSION['id_rol']==2)   {?>

                                            <script>
                                            setTimeout(function(){
                                            window.location.href="homeSupervisor.php"
                                            },1000);
                                            </script>

                                        
                                        <?php }
                                        //valida el tipo de usuarios en este caso valida si es ==3 COLABORADOR -->
                                        if(isset($_SESSION['redirect']) && $_SESSION['redirect']==true && $_SESSION['id_rol']==3)   {?>

                                            <script>
                                            setTimeout(function(){
                                            window.location.href="homeColaborador.php"
                                            
                                            },1000);
                                            </script>

                                            
                                        <?php }
                                        //valida el tipo de usuarios y si NO tiene ROL asignado --> 
                                        if(isset($_SESSION['redirect']) && $_SESSION['redirect']==true && $_SESSION['id_rol']==null)   {?>

                                            <script>
                                            setTimeout(function(){
                                            window.location.href="viewUserRol/sinRol.php"
                                            
                                            },1000);
                                            </script> 

                                        <?php }
                                        session_unset();
                                     } 

                                        //header("Location: login.php");
                                    ?>
                                        <!-- end alert conf. -->


                                    
                                    
















                                                        

















