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
if (isset($_POST["next"]))
{

 $dp = ($_POST['dp']);
   $sem = ($_POST['sem']);
   
   

}
//echo $_POST['fn'];
//echo $_POST['sub1'];
?>

<div  style="width:500px;height:500px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07; margin-left:50px; margin-top:50px; text-align:center"> 
<form method="post" action="ecap9.php">
<?php
include_once('includes/connection.php');
$sql="SELECT * FROM `temp_room` WHERE b_str='1'";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
if($count>=1)
{
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

<input name="c" type="checkbox" onchange="document.getElementById('fd<?php echo $k;?>').disabled = !this.checked; document.getElementById('fdh<?php echo $k;?>').disabled = !this.checked;" value="1" style=" width:21px; height:21px;"  />
<input type="hidden" name="sem[]" id="fd<?php echo $k;?>" value="<?php echo $d[$i]; ?>" disabled="disabled" />
 <input name="dp[]" type="text" id="fdh<?php echo $k;?>" value="<?php echo $rows[1]; ?>"  disabled="disabled"  readonly style="width:100px; height:20px;" />
</div>
<?php
}
}
echo '</br>';
}

}//first if
else
{ echo ("<SCRIPT LANGUAGE='JavaScript'>
    
window.location.href ='ecap9.php';
 </SCRIPT>");
	}
?>
</div>
<div id=""  style="width:140px;height:50px; float:left; text-align:center;">
  <input class="in" type="submit" name="Next" value="FINISH>>" style="height:30px;width:100px;background-color: #90cdec;font-family: monospace;
font-style:italic; font-size:20px; border-radius:5px; margin-left:450px" >&nbsp;
</div>
</form>

 
 

</div></div>
</body>
</html>