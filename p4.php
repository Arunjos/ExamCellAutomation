<?php include_once('includes/session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>exam cell automation</title>
<link href="css/exam cell automation.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function showUser(str)
{ 
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","subpag4.php?q="+str,true);
xmlhttp.send();
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
</head>

<body leftmargin="0" topmargin="0">

<div id="background1">

	                 <div id="header1">
                     </div>
                     
                     <div id="a99z"><div id="az98z">
                     <div id="a95z">
                     
                      <FORM METHOD="" action="">
<INPUT type="button" name="" VALUE=""  id="azz95z01z1" style="width:35px; height:35px; float:right; border:hidden; background-image:url(css/png/2.png);"  />

                                     </FORM>
                                     
                                     <FORM METHOD="post" action="p3.php">
<INPUT type="submit" name="" VALUE=""  id="azz95z01z2" style="width:35px; height:35px; float:right; border:hidden; background-image:url(css/png/1a.png);" />

                                     </FORM>
                     
                     
                     </div>
                     <div id="a94z">
                                            
                       <form action=""  method="post" >

<?php
include_once('includes/connection.php');
if(isset($_POST['delete1']))
{
$sql="DELETE FROM `grp_$un` WHERE id='$_POST[id]'";
$result= mysql_query($sql)or die(mysql_error());
}
if(isset($_POST['delete']))
{
$sql="DELETE FROM `grp_$un` WHERE gpname='$_POST[gp]'";
$result= mysql_query($sql)or die(mysql_error());
}

if(isset($_POST['sub1']) || isset($_POST['sub2']))
{

if($_POST['rn']=='')
{
echo '<script type="text/javascript">'
   , 'alert("TYPE A ROOM NAME AND RETRY");'
   , '</script>';

}else
{
if(isset($_POST['sub2']))
{
$sql="DELETE FROM `grp_$un` WHERE id='$_POST[id]'";
$result= mysql_query($sql)or die(mysql_error());
}

$sql="SELECT * FROM `grp_$un` WHERE rmname='$_POST[rn]'";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result); 
if($count>=1)
{
echo '<script type="text/javascript">'
   , 'alert("ROOM NAME ALREADY EXSIST TRY OTHER ONE");'
   , '</script>';
}
else
{

$sql="INSERT INTO `grp_$un`(`gpname`, `rmname`, `noseat`, `strength`, `id`) VALUES ('$_POST[gp]','$_POST[rn]','$_POST[bn]','$_POST[str]','')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }
}
}
}

if(isset($_POST['sub']))
{
if($_POST['gpname']=='')
{echo '<script type="text/javascript">'
   , 'alert("TYPE A GROUP NAME AND RETRY");'
   , '</script>';
}
else
{
$sql="SELECT * FROM `grp_$un` WHERE gpname='$_POST[gpname]'";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result); 
if($count>=1)
{
echo '<script type="text/javascript">'
   , 'alert("GROUP ALREADY EXSIST");'
   , '</script>';
}
else
{
$sql="INSERT INTO `grp_$un`(`gpname`, `rmname`, `noseat`, `strength`, `id`) VALUES ('$_POST[gpname]','','','','')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }

}}}
?>


<?php 
$sql="SELECT * FROM `grp_$un` WHERE rmname=''";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result); 
?> 

<div  style="width:500px;height:50px;line-height:2em; padding:5px;background-color:#b4dff5;color:#714D03;border:4px; ">

<input name="gpname" type="text" value="" size="0" maxlength="100" placeholder="ENTER GROUP NAME" style="width:250px; height:30px; background-color:#def4ff;">                                                                           

<input type="submit" name="sub" value="+" style="height:40px;width:40px;border-radius: 15px;
border-color:#000000;background-color:#D5DDF7;
font-style: italic;font-size:30px;" >

TOTAL NO. GP'S:<input name="" type="text" value=" <?php echo $count;?>"   disabled style="width:20px; height:20px;">                                                                           

</div>



<div  style="width:500px;height:425px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px; ">



<?php
if($count>=1)
{   $i=0;
  while($rows=mysql_fetch_row($result))
{$i++;
?>
</br>
<div  style="width:450px;height:300px;line-height:2em; padding:0px;background-color:#FCFADE;color:#714D03;border:4px double #000;"> 

<div  style="width:445px;height:100px;line-height:2em; padding:0px;background-color:#b4dff5;color:#714D03;border:4px ;"> 

<form action=""  method="post" >
<?php 
$s="SELECT * FROM `grp_$un` WHERE rmname!='' and gpname='$rows[0]'";
$r= mysql_query($s)or die(mysql_error());
$count1=mysql_num_rows($r); 
//echo $count1;
?> 

<div  style="width:430px;height:30px;line-height:2em; padding:5px;background-color:#b4dff5;color:#714D03; border-color:#333;"> 
GP NO.:<input name="" type="text" value="<?php echo $i;?>"   disabled style="width:20px; height:20px;">                                                          
&nbsp;&nbsp;
GROUP NAME: <input name="gp" type="text" value="<?php echo $rows[0];?>"  readonly style="width:100px; height:20px;" />
&nbsp;&nbsp;
ROOM'S:<input name="" type="text" value=" <?php echo $count1; ?>"   disabled style="width:20px; height:20px;">                                                                           

<input type="submit" name="delete" value="X" style="height:25px;width:25px;border-radius: 5px;
border-color:#000000;background-color:#D5DDF7;
font-style: italic;font-size:5px; margin-left:440px; margin-top:-47px;">


</div>


<div  style="width:430px;height:37px;line-height:2em; padding:5px;background-color:#b4dff5;color:#714D03;border:4px ;"> 

<input name="rn" type="text" value="" placeholder="ROOM NAME" style="width:100px; height:20px;background-color:#def4ff;" /> </tn>
<input name="bn" type="text" value=""  placeholder="NO. OF BENCHES" style="width:100px; height:20px;background-color:#def4ff;" /> </tn>
BNH STR:<select name="str" style="width:40px; height:20px;" />
<option value=""></option>
<option value="2">2</option>
<option value="1">1</option>
</select>
<input type="submit" name="sub1" value="ADD ROOM" style="height:20px;width:100px;border-radius: 15px;
border-color:#040404;background-color:#D5DDF7;
font-style: italic;font-size:15px;" >


</div>
</form>
</div>

<div  style="width:445px;height:185px;line-height:2em; overflow:scroll;padding:0px;background-color:#b4dff5;color:#714D03;border:4px ;"> 
<?php
if($count1>=1)
{   $k=0;
  while($row=mysql_fetch_row($r))
{$k++;
?>
Room NO.<input name="" type="text" value=" <?php echo $k;?>"   disabled style="width:20px; height:20px;">&nbsp;&nbsp;
<input type="button" name="s" value="<?php echo $row[1]; ?>" style="height:30px;width:250px;
border-color:#040404;background-color:#def4ff;
font-style:italic; font-size:20px; border-radius:5px;" onclick='showUser(<?php echo $row[4]; ?>)'></br></br>


<?php
}
}
?>

</div>

</div>
</br>
<?php
}
}
?>
</div>
</form>
                     
                     
                     
                     
                     </div>
                     
                     </div>
                       <div id="a97z"><div id="txtHint">
</div></div>
                     </div>



</div>

</body>
</html>
