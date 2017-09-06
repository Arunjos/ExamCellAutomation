<?php
require('fpdf.php');
$a='HELLO';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$a);
$pdf->Cell(60,10,'Powered by FPDF.',0,1,'C');
$pdf->Output();
$pdf->Output('abc.pdf', 'D');

?>