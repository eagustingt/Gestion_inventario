<?php
require('../fpdf/fpdf.php');
include ("../db.php") ; 

//consulta a base de datos
$query = "SELECT 
inv.id_producto,
inv.producto,
inv.descripción,
inv.cantidad,
inv.precio_unitario,
inv.fecha_ingreso,
inv.estado,
cat.nombre_categoria as categoría,
prov.nombre_proveedor as proveedor
FROM 
  inventario as inv
  LEFT JOIN categorias as cat on inv.id_categoria = cat.id_categoria
  LEFT JOIN proveedores as prov on inv.id_proveedor = prov.id_proveedor;";
  
$result= $conn->query($query);


//instancia para fpdf
$pdf = new FPDF();




$pdf->AddPage('L');  //por defecto vertical(), para horizontal('L')
$pdf->SetFont('Arial','B',14);  //par la fuente arial, negrita, tamano 14






//titulo
$pdf->Cell(0, 10, 'Inventario Disponible',1, 1,'C'); //ancho, alto, titulo,borde, salto de line, alinear
$pdf->SetFillColor(5,9, 59);
$pdf->Ln(5); //salto de line


//Encabezado
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25, 10, 'Id producto',1,0,'C');
$pdf->Cell(40, 10, 'producto',1,0,'C');
$pdf->Cell(42, 10, 'descripcion',1,0,'C');
$pdf->Cell(20, 10, 'cantidad',1,0,'C');
$pdf->Cell(30, 10, 'precio unitario',1,0,'C');
$pdf->Cell(30, 10, 'categoria',1,0,'C');
$pdf->Cell(30, 10, 'proveeddor',1,0,'C');
$pdf->Cell(30, 10, 'fecha de ingreso',1,0,'C');
$pdf->Cell(30, 10, 'estado',1,0,'C');
$pdf->Ln();


//tbody
$pdf->setFont('Arial','',8);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $pdf->Cell(25, 10, $row['id_producto'],1,0,'C');
        $pdf->Cell(40, 10, $row['producto'],1);
        $pdf->Cell(42, 10, $row['descripción'],1);
        $pdf->Cell(20, 10, $row['cantidad'],1,0,'C');
        $pdf->Cell(30, 10, $row['precio_unitario'],1,0,'C');
        $pdf->Cell(30, 10, $row['categoría'],1);
        $pdf->Cell(30, 10, $row['proveedor'],1);
        $pdf->Cell(30, 10, $row['fecha_ingreso'],1);
        $pdf->Cell(30, 10, $row['estado'],1);
        $pdf->Ln();
    }
}


//salida archivo pdf
$pdf->Output('D','reporteProductos.pdf'); //(D=Download, I= Internet, F=File), Nombre del reporte




?>