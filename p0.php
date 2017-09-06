<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>exam cell automation</title>
<link href="css/exam cell automation.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
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
                        
                        
	                 <div id="cnt2z">
                     				<div id="x1">
                                    			<div id="t1"></div>
                                    </div>
  <h0 style="position:absolute; top:18.5cm; left:20.5cm; color:#FF0000">                                  
 <?php
include_once('includes/connection.php');
if(isset($_POST["button"]))
{
$cid=$_POST['cid'];$fn=$_POST['fn'];$fd=$_POST['fd'];
$em=$_POST['em'];$un=$_POST['un'];$p=$_POST['p'];$cp=$_POST['cp'];

if($_POST['cid']==''||$_POST['fn']==''||$_POST['fd']==''||$_POST['em']==''||$_POST['un']==''||$_POST['p']==''||$_POST['cp']=='')
{	
echo "Fill complete data!!";
}
else if($p!=$cp)
{echo "Retyped password is wrong!!";}

else
{
$sql="SELECT * FROM `user` WHERE em='$em' ";
$result= mysql_query($sql)or die(mysql_error());

$count=mysql_num_rows($result);


if($count>=1)
{   
  echo "Email id already exist try other one!!";
}
else
{

//$pp=md5($p);
$sql="INSERT INTO `user`(`cid`, `fn`, `fd`, `em`, `un`, `p`) VALUES ('$_POST[cid]','$_POST[fn]','$_POST[fd]','$_POST[em]','$_POST[un]','".md5($_POST['p'])."')";

$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }

echo "Registerd succesfully please login";
$sql="CREATE TABLE $_POST[un] ( dptname CHAR(50),sem CHAR(30),prefix CHAR(30),
start INT,end INT,upload CHAR(30) )";

// Execute query
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }

$sql="CREATE TABLE grp_$_POST[un] ( gpname CHAR(50),rmname CHAR(30),
noseat INT,strength INT,id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY (id) )";

// Execute query
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }



$cid='';$fn='';$fd='';$em='';$un='';$p='';$p='';$cp='';
?>

<p><a href="exam cell automation.php">LOGIN</a></p>


<?php

}
}
}           
else
{
$cid='';$fn='';$fd='';$em='';$un='';$p='';$p='';$cp='';                                   
}
?>
</h0>

<form id="form1" name="form1" method="post" action="">
                                    
                                    
                                    <div id="reg1"><div id="txt01">College Id</div><div id="cln">:</div><div id="txtbx1"><input name="cid" type="text" value="<?php echo $cid; ?>" placeholder="college id" size="30" maxlength="100"  style="height:30px; margin-top:0px; background-color:#effbfe;"/></div></div>
                                  <div id="reg2"><div id="txt02">Faculty Name</div><div id="cln">:</div><div id="txtbx2"><input name="fn" type="text" value="<?php echo $fn;?>" placeholder="Faculty name" size="30" maxlength="100"  style="height:30px; margin-top:0px; background-color:#effbfe;"/></div></div>
                                    <div id="reg3">
                                      <div id="txt03">Faculty Details</div><div id="cln">:</div><div id="txtbx3"><input name="fd" type="text" value="<?php echo $fd;?>" placeholder="faculty details" size="30" maxlength="100"  style="height:30px; margin-top:0px; background-color:#effbfe;"/></div></div>
                                    <div id="reg4"><div id="txt04">Email</div><div id="cln">:</div><div id="txtbx4"><input name="em" type="text" value="<?php echo $em;?>" placeholder="email" size="30" maxlength="100"  style="height:30px; margin-top:0px; background-color:#effbfe;"/></div></div>
                                    <div id="reg5"><div id="txt05">User Name</div><div id="cln">:</div><div id="txtbx5"><input name="un" type="text" value="<?php echo $un;?>" placeholder="username" size="30" maxlength="100"  style="height:30px; margin-top:0px; background-color:#effbfe;"/></div></div>
                                    <div id="reg6"><div id="txt06">Password</div><div id="cln">:</div><div id="txtbx6"><input name="p" type="password" value="" placeholder="password" size="30" maxlength="100"  style="height:30px; margin-top:0px; background-color:#effbfe;"/></div></div>
                                    <div id="reg7"><div id="txt07">Comfirm Password</div><div id="cln">:</div><div id="txtbx7"><input name="cp" type="password" value="" placeholder="confirm password" size="30" maxlength="100"  style="height:30px; margin-top:0px; background-color:#effbfe;"/></div></div>
                       <div id="sub1">
                                    				<div id="submit1">
                                    				  
                                    				    <input type="submit" name="button" id="cc" value="Submit" style="width:80px; height:30px; background-color:#FFF; border:#000 thin; font-family:'Times New Roman'; color:#000; font-size:18px" />
                                  				    
                                                    </form>
                       				   </div>
                                    </div>
                                    
                     
                     </div>                        						

				



</div>





</body>
</html>
