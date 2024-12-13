<?php
include('../db.php');


//consulta bd
$sql= "SELECT p.nombre_proveedor,SUM(i.cantidad) AS totalxproveedor
        from inventario i
        JOIN proveedores p on p.id_proveedor=i.id_proveedor
        GROUP by p.nombre_proveedor
        ";
$result= $conn->query($sql);

$data =[];

if($result->num_rows>0){
    $data[]= ['Producto', 'Cantidad'];
    while($row = $result->fetch_assoc()) {

        $data[] = [$row['nombre_proveedor'], (int)$row['totalxproveedor']];
    }

}

echo json_encode($data);

?>