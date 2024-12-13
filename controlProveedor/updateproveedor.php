<?php 
include('../db.php');

$id = $_GET['id'];

$query= "   SELECT *
            FROM proveedores
            WHERE id_proveedor=$id;

        ";
        
$result = $conn->query($query);
$proveedor = $result->fetch_assoc();


if(isset($_POST['submit'])){

    $nombre_proveedor = $_POST['nombre_proveedor'];
    $telefono_proveedor = $_POST['telefono_proveedor'];
    $direccion_proveedor = $_POST['direccion_proveedor'];

    $query ="   UPDATE proveedores 
                SET nombre_proveedor='$nombre_proveedor',  telefono_proveedor='$telefono_proveedor', direccion_proveedor='$direccion_proveedor' 
                where id_proveedor=$id;
            ";

    if($conn->query($query)==TRUE){
        header('Location: ../controlProveedor.php');
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
         <form action="updateproveedor.php?id=<?php echo $id; ?>" method="POST">


                                        <div class="mb-3">
                                            <label for="nombre_proveedor">nombre_proveedor</label>
                                            <input type="text" name="nombre_proveedor" class="form-control" value="<?php echo $proveedor['nombre_proveedor']; ?>" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="telefono_proveedor">telefono_proveedor</label>
                                            <input type="text" name="telefono_proveedor" class="form-control" value="<?php echo $proveedor['telefono_proveedor']; ?>" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="direccion_proveedor">direccion_proveedor</label>
                                            <input type="text" name="direccion_proveedor" class="form-control" value="<?php echo $proveedor['direccion_proveedor']; ?>" require>
                                        </div>









            <button type="submit" name="submit" class="btn btn-success">Actualizar cambios</button>




         </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>