<?php
session_start();
if(!isset($_SESSION['username']))
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
    
window.location.href ='p1.php';
 </SCRIPT>");
}
$sum=0;
$un=$_SESSION['username'];
$e=$_SESSION['e_name'];
$e1=$_SESSION['e_no'];

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
        $this->Cell(49,7,$col,1);
    $this->Ln();
    
}
}
$pdf = new PDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
  $pdf->SetFont('Arial','B',16);
//$pdf->SetTextColor(255,255,255);
//$pdf->Cell(50,0,'WHITE ORANGE ORANGE WHITE',0,1,'C');
$pdf->Cell(60,10,'                                        JYOTHI ENGINEERING COLLEGE ',0,1,'C');
$pdf->Cell(60,10,'                                   Seating Arrangement ',0,1,'C');
$pdf->Cell(60,10,'                                  1st Sessional Examination ',0,1,'C');

$sql="SELECT * FROM `temp` GROUP BY dpt";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
while($rows=mysql_fetch_row($result))
{

$sql="SELECT * FROM `temp` WHERE dpt='$rows[1]' ";
$result1= mysql_query($sql)or die(mysql_error());
$pdf->Cell(60,10,'                                        '.$rows[1].'- DEPARTMENT ',0,1,'C');
$header = array('DEPARTMENT' , 'ROLL NO.', 'ROOM NAME');
$pdf->BasicTable($header);
while($rows=mysql_fetch_row($result1))
{
	$sql="SELECT * FROM `temp_stud` WHERE ad!='' and sem='$rows[0]' and dpt='$rows[1]' ";
$resultinner= mysql_query($sql)or die(mysql_error());
$ar=mysql_num_rows($resultinner);
$zr=($rows[5]-$ar);
if($ar!=0 && $rows[4] > $zr && $zr > $rows[3])
{ 	
$a='(Ar='.($rows[4]-$zr).')';}
else if($ar!=0 && $rows[4] > $zr && $zr <= $rows[3])
{ 
	$a='(Ar='.($rows[4]-$rows[3]+1).')';
	
	}
else
$a='';

$header = array($rows[0]."-".$rows[1] , $rows[3]."-".$rows[4].''.$a, $rows[2]);

$pdf->BasicTable($header);
}
$pdf->Cell(60,10,' ',0,1,'C');
}

// NEXT PAGES

$sql="DELETE FROM `seat_exam` WHERE no_exams='0'";
$es= mysql_query($sql)or die(mysql_error());

$sql="SELECT * FROM `temp` GROUP BY room";
$result= mysql_query($sql)or die(mysql_error());
$nums = mysql_num_rows($result);
while($rows=mysql_fetch_row($result))
{

	$sql="SELECT * FROM `grp_$un` WHERE rmname='$rows[2]' ";
$res= mysql_query($sql)or die(mysql_error());
	$l=mysql_fetch_row($res);
	  $p = ($l[2]*$l[3])/2;

$tempstore=array();		
$sql="SELECT * FROM `temp` WHERE room='$rows[2]' ";
$result2= mysql_query($sql)or die(mysql_error());
$k=1;
while($rows2=mysql_fetch_row($result2))	
	{
	$sql="SELECT * FROM `$un` WHERE dptname='$rows2[1]' and sem='$rows2[0]' ";
$resulttemp= mysql_query($sql)or die(mysql_error());
	$rowstemp=mysql_fetch_row($resulttemp);	
	
	$sql="SELECT * FROM `temp_stud` WHERE ad!='' and sem='$rows2[0]' and dpt='$rows2[1]' ";
$resultinner= mysql_query($sql)or die(mysql_error());
$ar=mysql_num_rows($resultinner);
$zr=($rows2[5]-$ar);
$a='';
if($ar!=0 && $rows2[4] > $zr && $zr > $rows2[3])
{ 	
$a=$rows2[4]-$zr;
}
else if($ar!=0 && $rows2[4] > $zr && $zr <= $rows2[3])
{ 
	$a=$rows2[4]-$rows2[3]+1;
	
	}
else
$a='';
for($i=$rows2[3];$i<=($rows2[4]-$a);$i++)
{
	$sql="SELECT * FROM `temp_stud` WHERE del='$rowstemp[2]$i' ";
$resultin= mysql_query($sql)or die(mysql_error());
$tr=mysql_num_rows($resultin);
if($tr==0)
{   
/*if($k==$p)
		$z1=$rows2[1].'-'.$rows2[0];
		if($k==$p+1)
		$z2=$rows2[1].'-'.$rows2[0];*/
	//$tempstore[$k]=$rows2[1].'-'.$rows2[0].':'.$rowstemp[2].''.$i;
	$tempstore[$k]=$rows2[1].'-'.$rows2[0].':'.' '.$i;
	$k++;
}
else
{   
/*if($k==$p)//
$z1=$rows2[1].'-'.$rows2[0];
		if($k==$p+1)
		$z2=$rows2[1].'-'.$rows2[0];*/

$tempstore[$k]=$rows2[1].'-'.$rows2[0].':';
	$k++;          
	}
}

	if($a!='')
	{
	while($rows3=mysql_fetch_row($resultinner))
	{
		/*if($k==$p)
		$z1=$rows2[1].'-'.$rows2[0];
		if($k==$p+1)
		$z12=$rows2[1].'-'.$rows2[0];*/
		
		$tempstore[$k]=$rows2[1].'-'.$rows2[0].':'.$rows3[2];
		$k++;
		}
	}//if close
	}	
	$pdf->AddPage();
	$pdf->Cell(60,10,'    ROOM NAME: '.$rows[2].' ',0,1,'C');
	$header = array('Seat No.' , 'Roll No.', 'Seat No.','Roll No.');
    $pdf->BasicTable($header);
/*if( intval($k/30)==0)
$s=1;
else
$s=intval($k/30);
$sum = $sum + $s;
*/
if( round($k/30)==0)
$s=1;
else
$s=round($k/30);
$sum = $sum + $s;

	  
	  $sql="INSERT INTO `seat_exam`(`ex_s_name`, `ex_n`, `room`, `f_neded`) VALUES ('$e','$e1','$rows[2]','$s')";
$ut=mysql_query($sql)or die(mysql_error());
	  $v=1;
	/* $p1=$p;
	  if(($k-1)<($p*2) && $l[3]!=1)
		{ 
		if($z1==$z2)
			{  
			$p=$p-(($p*2)-($k-1));
				
				}
			
			}*/
	 //  $pdf->Cell(60,10,'    ROOM NAME: '.$p.'     '.$k.'' ,0,1,'C');
	for($j=1,$m=$p+1; ($m<$k || $j<=$p); $j++,$m++)
	{
		/*if(($k-1)<($p1*2) && $l[3]!=1 && $j>$p)
		{
			if($z1==$z2)
			{$j=2*$p1;  }
			} */
			$header = array($v ,$tempstore[$j] , $v+1,$tempstore[$m] );
$pdf->BasicTable($header);
		$v=$v+2;
		
	 }
	
	}
	
	 $query="UPDATE `seat_exam` SET `f_neded`='$sum' WHERE no_exams !='0' ";
$t1=mysql_query($query)or die(mysql_error());
 $query="UPDATE `seat_exam` SET  `clz_occpid`='$nums' WHERE no_exams !='0' ";
$t1=mysql_query($query)or die(mysql_error());

$pdf->Output();?>