<?php include_once('includes/session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>exam cell automation</title>
<link href="css/exam cell automation2.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    ul{
        padding: 0;
        list-style: none;
    }
    

ul li input{
        display: block;
        padding: 5px 10px;
        color: #333;
        background: #D5DDF7;
        text-decoration: none;
height:35px;width:250px;

    }
ul li input:hover{
        color: #fff;
        background: #939393;
    }
    ul li ul{
        display: none;
    }
    ul li:hover ul{
        display: block; /* display the dropdown */
    }
	
	#div1, #div2
{float:left; width:100px; height:35px; margin:10px;padding:10px;border:1px solid #aaaaaa;}
</style>
<script type="text/javascript">

 function show()	{
	document.getElementById('a').style.display='block';
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
$sql="DELETE FROM `seat_exam` WHERE ex_s_name='$_POST[fn]'";
$result= mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }
}


if(isset($_POST['save']))
{
$sql="SELECT * FROM `seat_exam` WHERE ex_s_name='$_POST[nes]'";
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result); 
if($count>=1)
{
echo '<script type="text/javascript">'
   , 'alert("EXAM NAME ALREADY EXSIST TRY OTHER ONE");'
   , '</script>';
}
else
{

$sql="INSERT INTO `seat_exam`(`ex_s_name`, `no_exams`) VALUES ('$_POST[nes]','$_POST[noe]')";
$result=mysql_query($sql)or die(mysql_error());
if (!($result))
  {
  die('Error: ' . mysqli_error($link));
  }
}
}
?>


<div id="background1">

	                 <div id="header1">
                     </div>
                        
                        
	                 <div id="cnt2z">
                     				<div id="x1">
                                    			<div id="t1"></div>
                                    </div>
                                    
                                    <div id="xcnt1">
                                    <div id="xcnt01">
                                    
                                    <div id="xbtn">
                                     <FORM METHOD="" action="">
<INPUT TYPE="button" VALUE=""  id="bbn" style="width:191px; height:32px; float:left; border:hidden;" onclick='show();' />

                                     </FORM>
                                    
                                    </div>
                                    
                                    <div id="a" style="width:150px;height:150px;display:none;   padding:25px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07;">
<form method="post" action""> 
<input name="nes" type="text" placeholder="NAME OF EXAM SERIES" style="width:150px; height:30px;"></br></br>
<input name="noe" type="text" placeholder="NO. OF EXAMS" style="width:150px; height:30px;"></br></br>
<input name="save" type="submit" value="SAVE" style="width:150px; height:30px;">
</form>
</div>
                                    </div>
                                    
                                    </div>
                                    <div id="xcnt2">
                                    
                                    <div id="xcnt02">
                                    
                                    <div id="xcnt03">
                                    <div  style="width:500px;height:300px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07; margin-left:00px; margin-top:0px;"> 
<?php 
$s="SELECT * FROM `seat_exam`  WHERE no_exams!='0'";
$r= mysql_query($s)or die(mysql_error());
$count1=mysql_num_rows($r); 
//echo $count1;
if($count1>=1)
{   $k=0;
  while($row=mysql_fetch_row($r))
{$k++;
?>

<div id="b" style=" margin-left:400px; margin-top:00px;">
<form method="post" action="">
<input type="hidden" name="fn" value="<?php echo $row[0]; ?>" />

<input type="submit" name="delete" value="X" style="height:40px;width:40px;
background-color:#D5DDF7;font-family: monospace;
font-style:italic; font-size:20px; border-radius:5px;" >
</form>
</div>


<div id="b1" style=" margin-left:00px; margin-top:-55px;">
 
<ul>
        
        <li>
            <input type="button" name="abcde" value="<?php echo $row[0]; ?>" style="height:40px;width:400px;
background-color:#D5DDF7;font-family: monospace;
font-style:italic; font-size:20px; border-radius:5px;" >
            <ul>
<?php

for($i=1;$i<=$row[1];$i++)
{?>
<form method="post" action="ecap6.php">
<input type="hidden" name="fn" value="<?php echo $row[0]; ?>" />
                <li><input type="submit" name="sub1" value="EXAM<?php echo $i;?>" ></li>
</form>
<?php
}
?>            
</ul>
        </li></ul> </div>
    

<?php
}
}
?>





</div>

                                    
                                    
                                    </div>
                                    </div>
                                    
                                    </div>
	                 </div>                        						

				



</div>





</body>
</html>
