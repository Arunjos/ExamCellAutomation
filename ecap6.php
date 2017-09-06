<?php include_once('includes/session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/exam cell automation.css" rel="stylesheet" type="text/css" />
<style type="text/css">
 .in:hover {
        color: #fff;
        background: #939393
    }
    </style>
    <script type='text/javascript'>

	</script> 

</head>
<body leftmargin="0" topmargin="0">

<div id="background1">

	                 <div id="header1">
                     </div>
                     
                     <div id="czczcz">

<?php
//unset($_SESSION['e_name']);
//unset($_SESSION['e_no']);
if(isset($_POST['sub1']))
{
$_SESSION['e_name']=$_POST['fn'];
$_SESSION['e_no']=$_POST['sub1'];
}
//echo $_POST['fn'];
//echo $_POST['sub1'];
?>
<form method="post" action="">

<div  style="width:500px;height:500px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07; margin-left:50px; margin-top:50px; text-align:center"> 

<?php
include_once('includes/connection.php');

$sql = "truncate table temp_stud";
$result= mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }
  
  $sql = "truncate table temp_room";
$result= mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }



if(isset($_POST['dpt'])) 
  { 
  if(isset($_POST['c']))
  { 
  $dp = $_POST['dp'];
  $sem = $_POST['sem'];
   $strn = $_POST['strn'];
  $N = count($dp);
 
 for($i=0; $i<$N; $i++)
    {
	$sql="INSERT INTO `temp_stud`(`sem`, `dpt`, `del`, `ad`, `strn`) VALUES ('$sem[$i]','$dp[$i]','','','$strn[$i]')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }}}
  
    if(isset($_POST['b']))
  { 
  $gp = $_POST['gp'];
  $rn = $_POST['rn'];
   $strz = $_POST['strz'];
  $bz = $_POST['bz'];
  $N = count($rn);
 
 for($i=0; $i<$N; $i++)
    {
	$sql="INSERT INTO `temp_room`(`gpname`, `rmname`, `str`, `stra`, `b_str`) VALUES ('$gp[$i]','$rn[$i]','$strz[$i]','$strz[$i]','$bz[$i]')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }}}
  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    
window.location.href ='ecap7.php';
 </SCRIPT>");

  
  }
  
  

$d = array('s1/s2','s3/s4','s5/s6','s7/s8');
$k=0;
for($i=0;$i<4;$i++)
{
$sql="SELECT * FROM `$un` WHERE sem='$d[$i]' ";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
if($count>=1)
{?>
	 <input name="gp" type="text" value="<?php echo $d[$i]; ?>"  readonly style="width:400px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" /></br> <?php
while($rows=mysql_fetch_row($result))
{$k++;
?>
<div  style="margin-left:25px; "> 

<input name="c" type="checkbox" onchange="document.getElementById('tx<?php echo $k;?>').disabled = !this.checked;document.getElementById('th<?php echo $k;?>').disabled = !this.checked;document.getElementById('tk<?php echo $k;?>').disabled = !this.checked;" value="1" style=" width:21px; height:21px;" checked="checked" />
<input id="th<?php echo $k; ?>" type="hidden" name="sem[]" value="<?php echo $d[$i]; ?>" />
<input id="tk<?php echo $k; ?>" type="hidden" name="strn[]" value="<?php echo $rows[4]; ?>" />
 <input id="tx<?php echo $k; ?>" name="dp[]" type="text" value="<?php echo $rows[0]; ?>"  readonly style="width:100px; height:20px; " />

</div>
<?php
}
}
echo '</br>';
}
?>

</div>

<div  style="width:500px;height:500px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07; margin-left:700px; margin-top:-500px; text-align:center">
<?php
$sql="SELECT * FROM `grp_$un` WHERE rmname='' ";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
if($count>=1) 
while($rows=mysql_fetch_row($result))
{$k++;

?>
 <input name="gpn" type="text" value="<?php echo $rows[0]; ?>"  readonly style="width:400px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" /></br>
<?php 

$sql="SELECT * FROM `grp_$un` WHERE rmname!='' and gpname='$rows[0]'  ";
$result1= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result1);
if($count>=1) 
while($rows=mysql_fetch_row($result1))
{$k++;
?>
<input name="b" type="checkbox" onchange="document.getElementById('u<?php echo $k;?>').disabled = !this.checked;document.getElementById('a<?php echo $k;?>').disabled = !this.checked;document.getElementById('b<?php echo $k;?>').disabled = !this.checked;document.getElementById('c<?php echo $k;?>').disabled = !this.checked;" value="1" style=" width:21px; height:21px;" checked="checked" />
<input id="a<?php echo $k; ?>" type="hidden" name="gp[]" value="<?php echo $rows[0]; ?>" />
<input id="b<?php echo $k; ?>" type="hidden" name="strz[]" value="<?php echo $rows[2]; ?>" />
<input id="c<?php echo $k; ?>" type="hidden" name="bz[]" value="<?php echo $rows[3]; ?>" />
 <input id="u<?php echo $k; ?>" name="rn[]" type="text" value="<?php echo $rows[1]; ?>"  readonly style="width:100px; height:20px; " /></br>

<?php 
}
}
?> 
</div>

<input class="in" id="t<?php echo $k; ?>" type="submit" name="dpt"  value="NEXT>>" style="height:30px;width:150px;background-color: #90cdec;font-family: monospace;
font-style:italic; font-size:20px; border-radius:5px; margin-left:500px;" >
</form>
</div>
</div>

</body>
</html>