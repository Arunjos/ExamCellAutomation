<?php 
include_once('includes/session.php'); 
include_once('includes/connection.php');
 
 if($_POST['dp'] && $_POST['sem'])
 {
 
 $dp = ($_POST['dp']);
 $sem = ($_POST['sem']);
   $n = count($dp);
   for($i=0;$i<$n;$i++)
   {
	     $sql="SELECT * FROM `$un` WHERE sem='$sem[$i]' and dptname='$dp[$i]' ";
$result= mysql_query($sql)or die(mysql_error());

$rows=mysql_fetch_row($result);
$str=$rows[4];
	   
	   $sql="SELECT * FROM `temp_stud` WHERE sem='$sem[$i]' and dpt='$dp[$i]' and ad!='' ";
$result= mysql_query($sql)or die(mysql_error());

$add=mysql_num_rows($result);
 
 
 // $sql="SELECT * FROM `temp_stud` WHERE sem='$sem[$i]' and dpt='$dp[$i]' and del!='' ";
//$result= mysql_query($sql)or die(mysql_error());

//$sub=mysql_num_rows($result);
//$total=$str+$add-$sub;
$total=$str+$add;
  // echo "sem=".$sem[$i]."     dprtment= ".$dp[$i];
   //echo $total." s=  ".$str." a= ".$add."  sub=  ".$sub."</br>";
   
  $start=1;
  $end=$total;
   $sql="SELECT * FROM `temp_room` WHERE b_str='1'";
$result= mysql_query($sql)or die(mysql_error());
while($rows=mysql_fetch_row($result))
   { 
   $roomsize=$rows[2];
   if($total==0)
   break;
   else if($total > $roomsize)
   { //$e= $roomsize;
   $e=$start+$roomsize-1;
   	 $sql="INSERT INTO `temp`(`sem`, `dpt`, `room`, `st`, `end`, `bal`) VALUES ('$sem[$i]','$dp[$i]','$rows[1]','$start','$e','$end')";
$result1=mysql_query($sql)or die(mysql_error());
if (!($result1))
  {
  die('Error: ' . mysqli_error($link));
  }
  $sql="DELETE FROM `temp_room` WHERE rmname= '$rows[1]'";
$result1= mysql_query($sql)or die(mysql_error());
   //$start=$roomsize+1;
   //$total=$end-$roomsize;
     $start=$e+1;
   $total=$end-$e;
   continue;
   }
   else if($total < $roomsize)
   {
	   //$e= $start+($total-1);
	   $e=$end;
	   $sql="INSERT INTO `temp`(`sem`, `dpt`, `room`, `st`, `end`, `bal`) VALUES ('$sem[$i]','$dp[$i]','$rows[1]','$start','$e','$end')";
$result1=mysql_query($sql)or die(mysql_error());
if (!($result1))
  {
  die('Error: ' . mysqli_error($link));
  }      //$z= $rows[1];
	  // $bal=$roomsize-$total;
    //$query="UPDATE `temp_room` SET `str`='$bal' WHERE rmname='$rows[1]'";
//$result1=mysql_query($query)or die(mysql_error());
 $sql="DELETE FROM `temp_room` WHERE rmname= '$rows[1]'";
$result1= mysql_query($sql)or die(mysql_error());
if (!($result1))
  {
  die('Error: ' . mysqli_error($link));
  }
break;
   }
   else
   {
	   $sql="INSERT INTO `temp`(`sem`, `dpt`, `room`, `st`, `end`, `bal`) VALUES ('$sem[$i]','$dp[$i]','$rows[1]','$start','$end','$end')";
$result1=mysql_query($sql)or die(mysql_error());
if (!($result1))
  {
  die('Error: ' . mysqli_error($link));
  }
  $sql="DELETE FROM `temp_room` WHERE rmname='$rows[1]'";
$result1= mysql_query($sql)or die(mysql_error());
	   break;}
   }
   }
 }
   
   //IF TWO IS THE STRENGTH
   
      $sql="SELECT * FROM `temp_stud` WHERE del='' and ad='' ORDER BY `strn` DESC ";
$result= mysql_query($sql)or die(mysql_error());
   $num=mysql_num_rows($result);
    //$n1=($num-$n)/2;
	//echo $n1."</br>";
	$i=-1;
   while($rowsz=mysql_fetch_row($result))
   { 
   
   if($_POST['dp'] && $_POST['sem'])
 {
  
  for($j=0;$j<$n;$j++)
  {
   if($rowsz[0]==$sem[$j] && $rowsz[1]==$dp[$j])
   break;
  }
if($j<$n)
continue;
 }
   $i++;
   if(($i%2)==0)
   {$a='a'; $k=3;
   //echo $i." III</br>";
   }
   else
  { $a=''; $k=2;}
  
  if($i==$num)
  { $a=''; $k=2;}
	    /* $sql="SELECT * FROM `$un` WHERE sem='$rowsz[0]' and dptname='$rowsz[1]' ";
$result1= mysql_query($sql)or die(mysql_error());
$rows=mysql_fetch_row($result1);
*/
$str=$rowsz[4];
	   
	   $sql="SELECT * FROM `temp_stud` WHERE sem='$rowsz[0]' and dpt='$rowsz[1]' and ad!='' ";
$result1= mysql_query($sql)or die(mysql_error());

$add=mysql_num_rows($result1);
 
 
  //$sql="SELECT * FROM `temp_stud` WHERE sem='$rowsz[0]' and dpt='$rowsz[1]' and del!='' ";
//$result1= mysql_query($sql)or die(mysql_error());

//$sub=mysql_num_rows($result1);
//$total=$str+$add-$sub;
 $total=$str+$add;
   //echo "sem=".$sem[$i]."     dprtment= ".$dp[$i];
   //echo $total." s=  ".$str." a= ".$add."  sub=  ".$sub."</br>";
   
  $start=1;
  $end=$total;
   $sql="SELECT * FROM `temp_room` WHERE b_str='2' and str$a!='0'";
$result2= mysql_query($sql)or die(mysql_error());
while($rows=mysql_fetch_row($result2))
   { 
   $roomsize=$rows[$k];
   // $e=$start+$roomsize-1;
   if($total==0)
   break;
   else if($total > $roomsize)
   { //$e= $roomsize;
 $e=$start+$roomsize-1;
$sql="INSERT INTO `temp`(`sem`, `dpt`, `room`, `st`, `end`, `bal`) VALUES ('$rowsz[0]','$rowsz[1]','$rows[1]','$start','$e','$end')";
$result1=mysql_query($sql)or die(mysql_error());
if (!($result1))
  {
  die('Error: ' . mysqli_error($link));
  }
  $query="UPDATE `temp_room` SET `str$a`='0' WHERE rmname='$rows[1]'";
$result1=mysql_query($query)or die(mysql_error());
   //$start=$roomsize+1;
  // $total=$end-$roomsize;
   $start=$e+1;
   $total=$end-$e;
   continue;
   }
   else if($total < $roomsize)
   {
	    //$e= $start+($total-1);
	   $e=$end;
	   $sql="INSERT INTO `temp`(`sem`, `dpt`, `room`, `st`, `end`, `bal`) VALUES ('$rowsz[0]','$rowsz[1]','$rows[1]','$start','$e','$end')";
$result1=mysql_query($sql)or die(mysql_error());
if (!($result1))
  {
  die('Error: ' . mysqli_error($link));
  }      //$z= $rows[1];
	   $bal=$roomsize-$total;
    $query="UPDATE `temp_room` SET `str$a`='$bal' WHERE rmname='$rows[1]'";
$result1=mysql_query($query)or die(mysql_error());
if (!($result1))
  {
  die('Error: ' . mysqli_error($link));
  }
break;
   }
   else
   {
	   $sql="INSERT INTO `temp`(`sem`, `dpt`, `room`, `st`, `end`, `bal`) VALUES ('$rowsz[0]','$rowsz[1]','$rows[1]','$start','$end','$end')";
$result1=mysql_query($sql)or die(mysql_error());
if (!($result1))
  {
  die('Error: ' . mysqli_error($link));
  }
$query="UPDATE `temp_room` SET `str$a`='0' WHERE rmname='$rows[1]'";
$result1=mysql_query($query)or die(mysql_error());
	   break;
	   }
   }
   }
   
   
   
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    
window.location.href ='fpdf17/samplepdf1.php';
 </SCRIPT>");
	
   ?>