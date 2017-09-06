<?php include_once('includes/session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>exam cell automation</title>

<link href="css/exam cell automation1.css" rel="stylesheet" type="text/css" />

<link href="css/abc.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
 function show()	{
	document.getElementById('bgimg').style.display='block';
document.getElementById('bgimg1').style.display='none';
document.getElementById('background1').style.display='none';

	}
	
	function show1()	{
	document.getElementById('bgimg').style.display='none';
document.getElementById('bgimg1').style.display='none';
document.getElementById('background1').style.display='block';

}
	function show2()	{
document.getElementById('bgimg1').style.display='block';
document.getElementById('bgimg').style.display='none';
document.getElementById('background1').style.display='none';

}

function showUser(str)
{ show2();
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
xmlhttp.open("GET","subpag31.php?q="+str,true);
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
<?php

include_once('includes/connection.php'); 

if(isset($_POST['delete']))
{
$sql="DELETE FROM `$un` WHERE dptname='$_POST[dpt]'";
$result= mysql_query($sql)or die(mysql_error());
}


if(isset($_POST['submit']) || isset($_POST['submit1']))
{

if(!(isset($_POST["ckb"])))
{
echo '<script type="text/javascript">'
   , 'alert("You!! Do Not Seleted Any SEM ");'
   , '</script>';
}
else
{
if(isset($_POST['submit1']))
{
$sql="DELETE FROM `$un` WHERE dptname='$_POST[dpt]'";
$result= mysql_query($sql)or die(mysql_error());
}

$sql="SELECT * FROM `$un` WHERE dptname='$_POST[dpt]'";
$result= mysql_query($sql)or die(mysql_error());

$count=mysql_num_rows($result);

if($count>=1)
{   
  echo '<script type="text/javascript">'
   , 'alert( " Seleted Dpt alredy exit please delete and try or modify it ");'
   , '</script>';
}
else
{
$ckb =$_POST["ckb"];$p = $_POST['p'];$st = $_POST['st'];$e = $_POST['e'];//$f = $_POST['f'];
$N = count($ckb);

$fname=$_FILES["f"]["name"];	
if($fname=='' && isset($_POST['submit1']))
$fname=$_POST["f1"];

if ($_FILES["f"]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES["f"]["error"] . "<br />";
   }
  else
    {
  
    if (file_exists("files/" .$_FILES["f"]["name"]))
      {
      //echo $_FILES["f"]["name"] ." already exists. ";
  //unlink("files/" .$_FILES["f"]["name"]);
      }
   //else
     // {
      move_uploaded_file($_FILES["f"]["tmp_name"],
      "files/" . $_FILES["f"]["name"]);
     //} 

}

for($k=0; $k < $N; $k++)
    {	
$sql="INSERT INTO `$un`(`dptname`, `sem`, `prefix`, `start`, `end`, `upload`) VALUES ('$_POST[dpt]','$ckb[$k]','$p[$k]','$st[$k]','$e[$k]',
	'$fname')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }
	

}//while
}//javascript
}//forloop
}//javascript

?>
<div id="background1">


	                 <div id="header1">
                     </div>
                     
                     <div id="a99z"><div id="azz98z">
                     <div id="azz95z">
                     
                     
                      <FORM METHOD="post" action="p4.php">
<INPUT type="submit" name="" VALUE=""  id="azz95z01" style="width:35px; height:35px; float:right; border:hidden; background-image:url(css/png/2a.png);"  />

                                     </FORM>
                                     
                                      <FORM METHOD="" action="">
<INPUT type="button" name="" VALUE=""  id="azz95z02" style="width:35px; height:35px; float:right; border:hidden; background-image:url(css/png/1.png);"  />

                                     </FORM>
                     
                     
                     </div>
                     <div id="azz94z">
                      <div  style="width:500px;height:455px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;">

<?php
$d = array('','CS','EC','EEE','ME','IT','AEI');
for($k=1; $k < 7; $k++)
{
$sql="SELECT * FROM `$un` WHERE dptname='$d[$k]'";
$result= mysql_query($sql)or die(mysql_error());

$count=mysql_num_rows($result);

if($count>=1)
{   
?>

<input type="button" name="a[]" value= "<?php echo $d[$k]; ?>" style="   height:50px;width:300px; margin-left:90px; border-radius: 15px;
border-color:#000000;
    background-color:#D5DDF7;
        font-family: monospace;
    font-style: italic;
    font-weight: bolder;
    font-size: 25px;" onclick='showUser(<?php echo $k; ?>)'>

</br></br>

<?php

}
}//forloop ?>


</div>
                     
                     
                     
                     </div>
                     
                     </div>
                     <div id="zxa">
                     
                     <div id="zxa1">
                     
                      <FORM METHOD="" action="">
<INPUT type="button" name="Add Departments" VALUE=""  id="zxa11" style="width:286px; height:48px; float:left; border:hidden;"  onclick='show();'/>

                                     </FORM>
                     
                     </div>
                     </div>
                     </div>



</div>

<div id="bgimg1">
<div id="txtHint">
<?php //include_once('/subpag3.php'); ?> 
</div></div>


<div id="bgimg">
<?php include_once('/subpag3.php'); ?> 
</div>

</body>
</html>
