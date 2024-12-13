<?php
include('../db.php');


//consulta bd
$sql= "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) as totalXcategoria 
FROM inventario i 
join categorias c ON c.id_categoria=i.id_categoria
GROUP by c.nombre_categoria";
$result= $conn->query($sql);

$data =[];

if($result->num_rows>0){
    $data[]= ['Producto', 'Cantidad'];
    while($row = $result->fetch_assoc()) {

        $data[] = [$row['nombre_categoria'], (int)$row['totalXcategoria']];
    }

}

echo json_encode($data);

?>