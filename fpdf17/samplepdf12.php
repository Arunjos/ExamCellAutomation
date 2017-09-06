<?php
$host="localhost";
$pass="";
$uname="root";

$connection=mysql_connect($host,$uname,$pass);
if(!$connection)
{
die("Not Connected");
}
$result=mysql_select_db("project");
if(!$result)
{
die("Database Not selected");
}

require('fpdf.php');

class PDF extends FPDF
{

function BasicTable($header)
{
    // Header
    foreach($header as $col)
        $this->Cell(55,7,$col,1);
    $this->Ln();
    // Data
    //foreach($data as $row)
    //{
      //  foreach($row as $col)
        //    $this->Cell(40,6,$col,1); 
       // $this->Ln();
    //}
}
}
$pdf = new PDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
  $pdf->SetFont('Arial','B',16);

$pdf->Cell(60,10,'                                        JYOTHI ENGINEERING COLLEGE ',0,1,'C');
$pdf->Cell(60,10,'                                FACULTY ALLOCATION ',0,1,'C');

if(isset($_POST['finish'])) 
  { 
  $dpt = $_POST['dpt'];
  $fn = $_POST['fn'];
  $du = $_POST['du'];
  //$sem = $_POST['sem'];
  $N = count($fn); 
  

 
 $sql="SELECT * FROM `seat_exam` WHERE ex_n = '' ";
$result2= mysql_query($sql)or die(mysql_error());
$rows=mysql_fetch_row($result2);
if($rows[4]<$N)
$s=$rows[4];
else
$s=$N;
 for($i=0; $i<$s; $i++)
    {
	$c=$du[$i]+1;	
	$query="UPDATE `f_status` SET `d_status`='$c' WHERE dpt='$dpt[$i]' and f_name='$fn[$i]'";
$result5=mysql_query($query)or die(mysql_error());	
	
	}}
	
	$sql="SELECT * FROM `seat_exam` WHERE ex_n != '' ";
$result2= mysql_query($sql)or die(mysql_error());
//$num=mysql_num_rows($result2);
$i=0;
$header = array("ROOM NAME","FACULTY NAME","SIGNATURE");
	$pdf->BasicTable($header); 
	$pdf->SetFont('Arial','',14);
while($rows=mysql_fetch_row($result2))
   {
   while($rows[4]!=0)
   {
	   if($i==$s)
	   break;
	   $header = array($rows[3],$fn[$i].'('.$dpt[$i].')',"");
	$pdf->BasicTable($header);
	   $rows[4]--;
	   $i++;
	   }
	   }
$query="UPDATE `f_status` SET `status`='0'";
$result5=mysql_query($query)or die(mysql_error());
$pdf->Output();?>