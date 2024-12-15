<?php
require('../fpdf/fpdf.php');
include ("../db.php") ; 

//consulta a base de datos
$query = "SELECT 
m.id_movimiento,
i.producto,
m.tipo_movimiento,
m.cantidad,
m.fecha_movimiento,
m.observacion
from movimientos m 
join inventario i on i.id_producto=m.id_producto";
  
$result= $conn->query($query);


//instancia para fpdf
$pdf = new FPDF();

$pdf->AddPage('');  //por defecto vertical(), para horizontal('L')
$pdf->SetFont('Arial','B',14);  //par la fuente arial, negrita, tamano 14

//titulo
$pdf->Cell(0, 10, 'Reporte de Movimientos',1, 1,'C'); //ancho, alto, titulo,borde, salto de line, alinear
$pdf->SetFillColor(5,9, 59);
$pdf->Ln(5); //salto de line


//Encabezado Informacion que viene de la base de datos
$pdf->SetFont('Arial','B',8);
$pdf->Cell(25, 10, 'Id Movimiento',1,0,'C');
$pdf->Cell(30, 10, 'Producto ',1,0,'C');
$pdf->Cell(30, 10, 'Tipo de Movimiento',1,0,'C');
$pdf->Cell(20, 10, 'Cantidad',1,0,'C');
$pdf->Cell(30, 10, 'Fecha',1,0,'C');
$pdf->Cell(55, 10, 'Observacion',1,0,'C');
$pdf->Ln();


//tbody   llena con la informacion de la base de datos
$pdf->setFont('Arial','',8);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $pdf->Cell(25, 10, $row['id_movimiento'],1,0,'C');
        $pdf->Cell(30, 10, $row['producto'],1);
        $pdf->Cell(30, 10, $row['tipo_movimiento'],1);
        $pdf->Cell(20, 10, $row['cantidad'],1,0,'C');
        $pdf->Cell(30, 10, $row['fecha_movimiento'],1,0,'C');
        $pdf->Cell(55, 10, $row['observacion'],1);
        
        $pdf->Ln();
    }
}


//salida archivo pdf
$pdf->Output('I','reporteMovimientos.pdf'); //(D=Download, I= Internet, F=File), Nombre del reporte




?>