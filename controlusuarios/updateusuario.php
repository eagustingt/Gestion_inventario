<?php 
include('../db.php');

$id = $_GET['id'];

$query= "   SELECT u.id_usuario, u.fecha_creacion, u.nombre, u.usuario, u.contraseña, u.id_rol, u.email, u.telefono, r.nombre rol
            FROM usuarios u
            LEFT JOIN rol r ON u.id_rol= r.id_rol 
            WHERE id_usuario=$id;

        ";
        
$result = $conn->query($query);
$usuario = $result->fetch_assoc();


if(isset($_POST['submit'])){

    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id_rol = $_POST['id_rol'];;

    $query ="   UPDATE usuarios 
                SET nombre='$nombre',  usuario='$usuario', contraseña='$password' ,id_rol=$id_rol,  email='$email', telefono='$phone' 
                where id_usuario=$id;
            ";

    if($conn->query($query)==TRUE){
        header('Location: ../controlusuarios.php');
    }else{
        echo "Error de consulta";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   

</head>
<body>
    <div class="container mt-5">
        <h1>Editar usuarios</h1>

        <!-- agregar un formulario -->
         <form action="updateusuario.php?id=<?php echo $id; ?>" method="POST">


                                        <div class="mb-3">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="usuario">Usuario</label>
                                            <input type="text" name="usuario" class="form-control" value="<?php echo $usuario['usuario']; ?>" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password">Contraseña</label>
                                            <input type="text" name="password" class="form-control" value="<?php echo $usuario['contraseña']; ?>" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Correo Electrónico</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" require>
                                        </div>


                                        <div class="mb-3">
                                            <label for="phone">Teléfono</label>
                                            <input type="text" name="phone" class="form-control" value="<?php echo $usuario['telefono']; ?>" require>
                                        </div>

                                        
                                        <!-- inicia select ROL -->
                                        <div class="mb-3">

                                            <?php
                                                    $query = "SELECT id_rol, nombre FROM rol";
                                                    $result = $conn->query($query);

                                                    if( $result->num_rows>0){
                                                        echo '<label for="">  Rol  </label>';
                                                        echo '<select name="id_rol" class="form-select">';
                                                        echo '<option value=   "'.$usuario['id_rol'].'">   '.$usuario['rol'].'   </option>';
                                                    while($row = $result->fetch_assoc()){
                                                        echo '<option value=   "'.$row['id_rol'].'">'   .$row['nombre'].   '</option>';
                                                    }
                                                        echo '</select>';
                                                    } else{
                                                        echo 'no hay Rol';
                                                    }
                                            ?>
                                        </div>
                                        <!-- fin select ROL -->

            








            <button type="submit" name="submit" class="btn btn-success">Actualizar cambios</button>




         </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>