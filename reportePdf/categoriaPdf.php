<?php
require('../fpdf/fpdf.php');
include ("../db.php") ; 

//consulta a base de datos
$query = "SELECT *
          FROM  categorias
          ";

  
$result= $conn->query($query);


//instancia para fpdf
$pdf = new FPDF();
$pdf->AddPage('');  //por defecto vertical(), para horizontal('L')
$pdf->SetFont('Arial','B',14);  //par la fuente arial, negrita, tamano 14

//titulo
$pdf->Cell(0, 10, 'Reporte de Categorias',1, 1,'C'); //ancho, alto, titulo,borde, salto de line, alinear
$pdf->Ln(5); //salto de line


//Encabezado
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25, 10, 'Id Categoria',1,0,'C');
$pdf->Cell(60, 10, 'Categoria',1,0,'C');
$pdf->Cell(105, 10, 'Descripcion',1,0,'C');
$pdf->Ln();


//tbody informacion que viene de la base de datos
$pdf->setFont('Arial','',8);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $pdf->Cell(25, 10, $row['id_categoria'],1,0,'C');
        $pdf->Cell(60, 10, $row['nombre_categoria'],1);
        $pdf->Cell(105, 10, $row['descripcion_categoria'],1);
        $pdf->Ln();
    }
}





//salida archivo pdf
$pdf->Output('I','reporteCategorias.pdf'); //(D=Download, I= Internet, F=File), Nombre del reporte




?>