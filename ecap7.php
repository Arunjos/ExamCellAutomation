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
 function show()	{
	document.getElementById('hai').style.display='block';
	document.getElementById('hai1').style.display='none';
	document.getElementById('n').style.display='none';
	}
	function show1()	{
	document.getElementById('hai').style.display='none';
	document.getElementById('hai1').style.display='block';
	document.getElementById('n').style.display='none';
	}
	</script> 

</head>
<body leftmargin="0" topmargin="0">

<div id="background1">

	                 <div id="header1">
                     </div>
                     
                     <div id="czczcz">
<?php
include_once('includes/connection.php');
$sql = "truncate table temp";
$result= mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }
/*
$sql = "truncate table temp_stud";
$result= mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }*/

//echo $_POST['fn'];
//echo $_POST['sub1'];
?>

<div  style="width:500px;height:500px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07; margin-left:50px; margin-top:50px; text-align:center"> 

<?php



$d = array('s1/s2','s3/s4','s5/s6','s7/s8');
$k=0;
for($i=0;$i<4;$i++)
{
$sql="SELECT * FROM `temp_stud` WHERE sem='$d[$i]' and ad='' and del='' ";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
if($count>=1)
{?>
	 <input name="gp" type="text" value="<?php echo $d[$i]; ?>"  readonly style="width:400px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" /></br> <?php
while($rows=mysql_fetch_row($result))
{$k++;
?>
<div  style="margin-left:25px; "> 
<form method="post" action="">
<input name="c" type="checkbox" onchange="document.getElementById('fd<?php echo $k;?>').disabled = !this.checked;" value="1" style=" width:21px; height:21px;" checked="checked" />
<input type="hidden" name="gpname" value="<?php echo $d[$i]; ?>" />
 <input name="gp" type="text" value="<?php echo $rows[1]; ?>"  readonly style="width:100px; height:20px; background-color:#def4ff;" />
<input class="in" id="fd<?php echo $k; ?>" type="submit" name="dpt"  value="*" style="height:30px;width:30px;background-color: #90cdec;font-family: monospace;
font-style:italic; font-size:20px; border-radius:5px;" >
</form>
</div>
<?php
}
}
echo '</br>';
}
?>
</div>
<form action="ecap8.php" method="post">
 <div id=""  style="width:140px;height:50px; float:left; text-align:center;">
 <input class="in" type="submit" name="Next" value=">>" style="height:30px;width:100px;background-color: #90cdec;font-family: monospace;
font-style:italic; font-size:20px; border-radius:5px; margin-left:450px" >&nbsp;
</div>
</form>

<div id="hai"  style="width:450px;height:450px;line-height:2em;padding:5px;background-color:#b4dff5;color:#714D03; margin-left:600px; margin-top:-490px; display:none"> 
<form action="" method="post">
 <input class="in" type="submit" value="X" style=" width:18px; height:17px; background-image:url(css/png/x.png); margin-left:415px" />
 </form>
<?php 
if(isset($_POST['dpt']) || isset($_POST['delete']) || isset($_POST['add']) || isset($_POST['add1']))
{ 
echo '<script type="text/javascript">'
   , 'show();'
   , '</script>';

if(isset($_POST['delete']))
{

  if(isset($_POST['c'])) 
  { 
  $r = ($_POST['c']);
  $N = count($r);
 
 for($i=0; $i<$N; $i++)
    {
 $sql="DELETE FROM `temp_stud` WHERE ad= '$r[$i]'";
$result= mysql_query($sql)or die(mysql_error());
$count = mysql_affected_rows();
//mysqli_query($connection,"DELETE FROM `temp_stud` WHERE ad= '$r[$i]'");
//echo "Affected rows: " . mysqli_affected_rows($con);
//$count=mysqli_affected_rows($connection);
if ($count<=0)
  {
	$sql="INSERT INTO `temp_stud`(`sem`, `dpt`, `ad`, `del`) VALUES ('$_POST[gpname]','$_POST[gp]','','$r[$i]')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }}}}
  
}
  if(isset($_POST['add1']))
{

  if(isset($_POST['c'])) 
  { 
  $r = ($_POST['c']);
  $N = count($r);
 
 for($i=0; $i<$N; $i++)
    {
	$sql="INSERT INTO `temp_stud`(`sem`, `dpt`, `del`, `ad`) VALUES ('$_POST[gpname]','$_POST[gp]','','$r[$i]')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }}}}

if(isset($_POST['add']))
{   if($_POST['p']!='' && $_POST['no']!='')
{
	$sql="INSERT INTO `temp_stud`(`sem`, `dpt`, `ad`, `del`) VALUES ('$_POST[gpname]','$_POST[gp]','$_POST[p]$_POST[no]','')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }
}}

?>
<div id=""  style="width:420px;height:50px; text-align:center;"> 
 <input name="gp" type="text" value="<?php echo $_POST['gpname']."-".$_POST['gp']; ?>"  readonly style="width:300px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" /></br>
</div>
 <form method="post" action="">
  <input type="hidden" name="gpname" value="<?php echo $_POST['gpname']; ?>" />
<input type="hidden" name="gp" value="<?php echo $_POST['gp']; ?>" />
 <div id=""  style="width:420px;height:50px; text-align:center;"> 
 <input name="p" type="text" placeholder="prefix" style="width:150px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" />&nbsp;
 
 <input name="no" type="text" placeholder="No." style="width:50px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" />&nbsp;
 
 <input class="in" type="submit" name="add" value="+" style="height:30px;width:30px;background-color: #90cdec;font-family: monospace;
font-style:italic; font-size:20px; border-radius:5px;" >&nbsp;
 
 <input class="in"  type="submit" name="search" value="Search" style="height:30px;width:130px;background-color: #90cdec;font-family: monospace;
font-style:italic; font-size:20px; border-radius:5px;" >
</form>
 </div>

 <div id=""  style="width:420px;height:50px; text-align:center;">
  <form method="post" action="">
  <input class="in" type="submit" name="delete" value="Delete" style="height:30px;width:330px;background-color: #90cdec;font-family: monospace;font-style:italic; font-size:20px; border-radius:5px;" >
 </div>
 </br></br> </br></br>
  
  <div id=""  style="width:450px;height:350px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03; margin-left:-05px; margin-top:-140px;"> 
  
    <input type="hidden" name="gpname" value="<?php echo $_POST['gpname']; ?>" />
<input type="hidden" name="gp" value="<?php echo $_POST['gp']; ?>" />
   <?php 
   $sql="SELECT * FROM `$un` WHERE sem='$_POST[gpname]' and dptname='$_POST[gp]' ";
$result= mysql_query($sql)or die(mysql_error());
$rows=mysql_fetch_row($result);
for($k=1;$k<=$rows[4];$k++)
{
	 $sql="SELECT * FROM `temp_stud` WHERE del='$rows[2]$k' and sem='$_POST[gpname]' and dpt='$_POST[gp]' ";
	$result= mysql_query($sql)or die(mysql_error());
	$count=mysql_num_rows($result); 
if($count>=1)
continue;
	?>
   <div id=""  style="width:420px;height:50px; text-align:center;">
   <input name="c[]" type="checkbox" value="<?php echo $rows[2],$k; ?>" style=" width:21px; height:21px;" />
 <input name="regno" type="text" value="<?php echo $rows[2],$k; ?>"  readonly style="width:100px; height:20px; background-color:#def4ff;" />  </br>
   
   </div>
  

 <?php
   }
   $sql="SELECT * FROM `temp_stud` WHERE ad!='' and sem='$_POST[gpname]' and dpt='$_POST[gp]' ";
	$result= mysql_query($sql)or die(mysql_error());
	$count=mysql_num_rows($result); 
if($count>=1)
{
	while($rows=mysql_fetch_row($result))
{
//var_dump($rows);
	$sql="SELECT * FROM `temp_stud` WHERE del='$rows[2]' and sem='$_POST[gpname]' and dpt='$_POST[gp]' ";
	$result1= mysql_query($sql)or die(mysql_error());
	$count1=mysql_num_rows($result1); 
if($count1<'1')
{
?>
   <div id=""  style="width:420px;height:50px; text-align:center;">
   <input name="c[]" type="checkbox" value="<?php echo $rows[2]; ?>" style=" width:21px; height:21px;" />
 <input name="regno" type="text" value="<?php echo $rows[2]; ?>"  readonly style="width:100px; height:20px; background-color: #0F9" />    </br>
   
   
   <?php
}
}
}
}
?>
</form>
</div>
</div>

<div id="hai1"  style="width:450px;height:450px;line-height:2em; padding:5px;background-color:#b4dff5;color:#714D03; margin-left:600px; margin-top:-490px; display:none">
<form action="" method="post">
 <input class="in" type="submit" value="X" style=" width:18px; height:17px; background-image:url(css/png/x.png); margin-left:415px" />
 </form> 
<?php
if(isset($_POST['search']))
{
echo '<script type="text/javascript">'
   , 'show1();'
   , '</script>';
?>
   <form method="post" action="">
   <input type="hidden" name="gpname" value="<?php echo $_POST['gpname']; ?>" />
<input type="hidden" name="gp" value="<?php echo $_POST['gp']; ?>" />
    <div id=""  style="width:420px;height:50px; text-align:center;">
  <input class="in" type="submit" name="add1" value="ADD SELECTED ROLL NO." style="height:30px;width:330px;background-color: #90cdec;font-family: monospace;font-style:italic; font-size:20px; border-radius:5px;" >
 </div>
 
 <div id=""  style="width:450px;height:380px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03; margin-left:-5px; margin-top:0px;">
 <?php 
 if($_POST['gpname']=='s1/s2')
 {$k=3;}
 else if($_POST['gpname']=='s3/s4')
 {$k=2;}
 else if($_POST['gpname']=='s5/s6')
{$k=1;}
else
{$k=0;}$i=8;
while($k>0)
{ 
	$sem="s".($i-1)."/s".$i;
	?>
</br>
<div id=""  style="width:420px;height:50px; text-align:center;"> 
 <input name="" type="text" value="<?php echo $sem."-".$_POST['gp']; ?>"  readonly style="width:300px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" />
</div>	</br>
	

<div  style="width:400px;height:400px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07;">
<?php
   $sql="SELECT * FROM `$un` WHERE sem='$sem' and dptname='$_POST[gp]' ";
$result= mysql_query($sql)or die(mysql_error());
$rows=mysql_fetch_row($result);
for($j=1;$j<=$rows[4];$j++)
{
?>
   <div id=""  style="width:350px;height:50px; text-align:center;">
   <input name="c[]" type="checkbox" value="<?php echo $rows[2],$j; ?>" style=" width:21px; height:21px;" />
 <input name="regno" type="text" value="<?php echo $rows[2],$j; ?>"  readonly style="width:100px; height:20px; background-color:#def4ff;" /></div>


<?php	
}
?> 
</div>
<?php
$k--; $i=$i-2;
}
	}
 ?> </form>
 </div> 
</div>
</div>

</body>
</html>