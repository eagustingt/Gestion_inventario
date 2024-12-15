<?php 
include('../db.php');


$id = $_GET['id'];
$query =   "SELECT i.id_producto, i.producto, i.descripción, i.cantidad, i.precio_unitario, i.fecha_ingreso, i.estado, i.id_categoria, i.id_proveedor, c.nombre_categoria , p.nombre_proveedor
            FROM inventario i
            JOIN categorias c ON  i.id_categoria = c.id_categoria
            JOIN proveedores p ON i.id_proveedor = p.id_proveedor
            WHERE id_producto=$id;
            ";

$result = $conn->query($query);
$inventario = $result->fetch_assoc();



if(isset($_POST['submit'])){
    //$id_producto = $_POST['id_producto'];
    $producto = $_POST['producto'];
    $descripción = $_POST['descripción'];
    $cantidad = $_POST['cantidad'];
    $precio_unitario = $_POST['precio_unitario'];
    $categoría = $_POST['categoría'];
    $proveedor = $_POST['proveedor'];
    $estado = $_POST['estado'];

    $query ="UPDATE inventario 
             SET  producto='$producto',descripción='$descripción',cantidad=$cantidad, precio_unitario=$precio_unitario,
                  estado='$estado',id_categoria=$categoría,id_proveedor=$proveedor
             where id_producto=$id";

    if($conn->query($query)==TRUE){
        header('Location: ../editarproducto.php');
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
        <h1>Editar inventario</h1>

        <!-- agregar un formulario -->

         <form action="updateinventario.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="name">producto</label>
                <input type="text" name="producto" class="form-control" value="<?php echo $inventario['producto']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="name">descripción</label>
                <input type="text" name="descripción" class="form-control" value="<?php echo $inventario['descripción']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="name">cantidad</label>
                <input type="text" name="cantidad" class="form-control" value="<?php echo $inventario['cantidad']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="name">precio_unitario</label>
                <input type="text" name="precio_unitario" class="form-control" value="<?php echo $inventario['precio_unitario']; ?>" require>
            </div>

         
            <!-- inicia select categoria -->
            <div class="mb-3">

                    <?php
                    $query = "SELECT id_categoria, nombre_categoria FROM categorias";
                    $result = $conn->query($query);

                    if( $result->num_rows>0){
                            echo '<label for="categoria">  Categorias  </label>';
                            echo '<select name="categoría" class="form-control">';  
                            echo '<option value=   "'.$inventario['id_categoria'].'">   '.$inventario['nombre_categoria'].'   </option>';
                        while($row = $result->fetch_assoc()){
                            echo '<option value=   "'.$row['id_categoria'].'">   '.$row['nombre_categoria'].'   </option>';
                        }
                            echo '</select>';
                    } else {                  
                            echo 'no hay categorias';
                    }
                    ?>

            </div>
            <!-- fin select categoria -->



            <!-- inicia select proveedor -->
            <div class="mb-3">

                    <?php
                        $query = "SELECT id_proveedor, nombre_proveedor FROM proveedores";
                        $result = $conn->query($query);

                        if($result->num_rows>0){
                                echo '<label for="proveedor">   Proveedor   </label>';
                                echo '<select name="proveedor" class="form-select">';
                                echo '<option value="'.$inventario['id_proveedor'].'">    '.$inventario['nombre_proveedor'].'   </option>';
                            while($row = $result->fetch_assoc()){
                                echo '<option value="'.$row['id_proveedor'].'">    '.$row['nombre_proveedor'].'   </option>';
                            }
                                echo '</select>';
                        } else{
                            echo 'no hay proveedores';
                        }
                    ?>
            </div>
            <!-- fin select proveedor -->


            <div  class="mb-3">
                <label for="">Estado</label>

                <select name="estado" id="" class="form-select" >
                    <option value="<?php echo $inventario['estado']; ?>">   <?php echo $inventario['estado']; ?>   </option>    
                    <option value="Activo"> ACTIVO </option>
                    <option value="Desactivado">DESACTIVADO</option>
                    <option value="Retenido">RETENIDO</option>
                </select>

            </div>



            


            <button type="submit" name="submit" class="btn btn-success">Actualizar cambios</button>

         </form>
     
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>