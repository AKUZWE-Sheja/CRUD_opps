<?php
require_once "connection.php";
require_once "fpdf/fpdf.php";

$result = "SELECT * FROM users ORDER by id";
$sql= $conn->query($result);

$pdf= new FPDF();
$pdf-> AddPage();
$pdf-> SetFont('Arial','B',12);
while($row = $sql->fetch_object()){
 $id = $row->id;
 $firstname = $row->fname;
 $lastname = $row->lname;
 $email = $row->email;
 $gender = $row->gender;
 
 $pdf->Cell(10, 10, $id, 1);
 $pdf->Cell(40, 10, $firstname, 1);
 $pdf->Cell(50, 10, $lastname, 1);
 $pdf->Cell(65, 10, $email, 1);
 $pdf->Cell(20, 10, $gender, 1);
 $pdf->Ln();
}
$pdf->Output();
?>