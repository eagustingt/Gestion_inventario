<?php 
include('../db.php');

$id = $_GET['id'];

$query= "   SELECT *
            FROM categorias
            WHERE id_categoria=$id;

        ";
        
$result = $conn->query($query);
$categoria = $result->fetch_assoc();


if(isset($_POST['submit'])){

    $nombre_categoria = $_POST['nombre_categoria'];
    $descripcion_categoria = $_POST['descripcion_categoria'];
   

    $query ="   UPDATE categorias 
                SET nombre_categoria='$nombre_categoria',  descripcion_categoria='$descripcion_categoria'
                where id_categoria=$id;
            ";

    if($conn->query($query)==TRUE){
        header('Location: ../controlCategoria.php');
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
        <h1>Editar Categoria</h1>

        <!-- agregar un formulario -->
         <form action="updatecategoria.php?id=<?php echo $id; ?>" method="POST">


                    <div class="mb-3">
                            <label for="nombre_categoria">Nombre Categoria</label>
                            <input type="text" name="nombre_categoria" class="form-control" value="<?php echo $categoria['nombre_categoria']; ?>" require>
                    </div>

                    <div class="mb-3">
                            <label for="descripcion_categoria">Descripcion</label>
                            <input type="text" name="descripcion_categoria" class="form-control" value="<?php echo $categoria['descripcion_categoria']; ?>" require>
                    </div>



                    <button type="submit" name="submit" class="btn btn-success">Actualizar cambios</button> 

         </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>