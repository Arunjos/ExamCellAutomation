<?php include_once('includes/session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>exam cell automation</title>

<link href="css/exam cell automation.css" rel="stylesheet" type="text/css" />
 <script type='text/javascript'>
 function show()	{
	document.getElementById('hai').style.display='block';
}
	
</script> 







</head>

<body leftmargin="0" topmargin="0">

<div id="background1">

	                 <div id="header1">
                     </div>
                     
                     <div id="a99klz">


<?php 
/*
UPDATE <table name>
SET
    ColumnA = <NULL, or '', or whatever else is suitable for the new value for the column>
WHERE
    ColumnA = <bad value> /* or any other search conditions 
	// next query
	DECLARE @IncrementValue int
SET @IncrementValue = 1
UPDATE Table1 SET Column1 = Column1 + @IncrementValue
	
	*/
include_once('includes/connection.php');
$query="UPDATE `f_status` SET `status`='0'";
$result5=mysql_query($query)or die(mysql_error());
if(isset($_POST['submit']))
{ 
if($_POST['start']<=$_POST['end'] || $_POST['end']==0 )
{

$avail=array();$k=1;$day=array("MON"=>"1","TUE"=>"10","WED"=>"19","THU"=>"28","FRI"=>"37");
$sql="SELECT * FROM `$un` GROUP BY dptname";
$result= mysql_query($sql)or die(mysql_error());
while($rows=mysql_fetch_row($result))
{    //echo  $day[$_POST['day']]."</br>";
	$filename= "files/".$rows[5]."";
	
	 $sql="SELECT * FROM `f_status` WHERE file='$filename' ";
$result2= mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result2);
 if($num==0)
 { $sql="DELETE FROM `f_status` WHERE dpt='$rows[0]'";
$result3= mysql_query($sql)or die(mysql_error());
	 }
	
	
    $file = fopen($filename, "r");
        $i=0;$j=0;
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
          $j++;
if($j>6)
{
	if($emapData[0]!='')
	{
//if($_POST['day']=='MON')
//{ 	
if($num==0)
 {
	 $sql="INSERT INTO `f_status`(`dpt`, `f_name`, `d_status`, `file`, `status`) VALUES ('$rows[0]','$emapData[1]','0','$filename','')";
$result4=mysql_query($sql)or die(mysql_error());
	 }

if($_POST['start']>4)
$z= $day[$_POST['day']]+1;
else
$z= $day[$_POST['day']];
if($_POST['end']==0)
{ 
	if($emapData[$_POST['start']+$z]=='')
	{$avail[$k][0]=$emapData[1];
$avail[$k][1]=$rows[0];
	 $query="UPDATE `f_status` SET `status`='1' WHERE dpt='$rows[0]' and f_name='$emapData[1]'";
$result5=mysql_query($query)or die(mysql_error());
	$k++; 
	}
	}
	else
	{
		$y=$z;
for($i=$_POST['start']+$z;$i<=($_POST['end']+$z);$i++)
{ //echo $z."hello </br>";
	
	if($i==($y+5))
{$z= $day[$_POST['day']]+1;continue;}

	if($emapData[$i]!='')
       break;
} //row check;
if($i>($_POST['end']+$z))
{$avail[$k][0]=$emapData[1];
$avail[$k][1]=$rows[0];
$k++;
 $query="UPDATE `f_status` SET `status`='1' WHERE dpt='$rows[0]' and f_name='$emapData[1]'";
$result5=mysql_query($query)or die(mysql_error());

}

}//else
//}//mon
	
	
	
	
	
	
	
	
	}//chek row null
}// row read
      
	  }//read end whole record  
	/*$query="UPDATE `f_status` SET `status`='0'";
$result5=mysql_query($query)or die(mysql_error());*/
		$avail[$k][0]="end";$k++;
	 fclose($file);
    }
	
for($j=0;$j<=25;$j++)
{ //echo $avail[$j][1]."  ";
//echo $avail[$j][0]."||</br>";
}//break;
}//condition
}
?>
<form action=""  method="post" enctype="multipart/form-data" >
<?php 
if(!isset($_POST['trial']))
{ 
 $sql="SELECT * FROM `seat_exam` WHERE ex_n = '' ";
$result2= mysql_query($sql)or die(mysql_error());
$rows=mysql_fetch_row($result2);
}
?>	
   <div id="a" style="width:250px;height:350px;   padding:0px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07; float:left; margin-left:25px; margin-top:100px;"> 
 <div align="center">  <input name="" value="<?php echo $rows[0];?>" type="text"  readonly="readonly" style="width:240px; height:20px; text-align:center;"></div>
  <div>  NO. OF CLASS NEEDED:<input name="" value="<?php echo $rows[5];?>" type="text"  readonly="readonly" style="width:30px; height:30px; text-align:center;"> </div></br >
 <div>   NO. OF FACLUTY NEDDED:<input name="" value="<?php echo $rows[4];?>" type="text"  readonly="readonly" style="width:30px; height:30px; text-align:center;"></div></br >
    <div>ENTER THE DAY:<select name="day" style=" margin-top:10px; margin-left:25px; width:125px; height:30px;">
   <option value="MON">MON</option>
  <option value="TUE">TUE</option>
  <option value="WED">WED</option>
  <option value="THU">THU</option>
  <option value="FRI">FRI</option>
</select>
   	     
 </div>
 <div>ENTER THE PERIODS:
   <div align="center">
     <select name="start" style=" margin-top:10px; margin-left:25px; width:40px; height:40px;">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
</select>
   </div>
-
<div align="center">    <select name="end" style=" margin-top:10px; margin-left:25px; width:40px; height:40px;">
   <option value="0"></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
</select>

</div>

   	     
 </div></br>
 
 <div><INPUT TYPE="submit" VALUE="Submit" name="submit"  id="bbn" style="width:191px; height:32px; float:left; border:hidden; margin-left:25px;"  /></div>
 
 </div>
 </form>
 
 
 <form action="fpdf17/samplepdf12.php"  method="post" enctype="multipart/form-data" >
<div  style="width:400px;height:450px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07; margin-left:0px; margin-top:55px; text-align:center; float:left;"> 

<?php



if(isset($_POST['submit']))
{

   $sql="SELECT * FROM `f_status` WHERE status='1' ORDER BY `d_status` ASC ";
$res= mysql_query($sql)or die(mysql_error());
  $num=mysql_num_rows($res); 
  
?>
	 <input name="gp" type="text" value="FACULTIES AVAILABLE"  readonly style="width:250px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" /> TOTAL:<input name="" type="text" value="<?php echo $num;?>"  readonly style="width:40px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" /></br> 
	 <?php
while($rows=mysql_fetch_row($res))
{$k++;
?>
<div  style="margin-left:25px; "> 

<input name="c" type="checkbox" onchange="document.getElementById('tx<?php echo $k;?>').disabled = !this.checked;document.getElementById('th<?php echo $k;?>').disabled = !this.checked;document.getElementById('tk<?php echo $k;?>').disabled = !this.checked;" value="1" style=" width:21px; height:21px;" checked="checked" />
<input id="th<?php echo $k; ?>" type="text" name="dpt[]" value="<?php echo $rows[0]; ?>" readonly style="width:30px; height:20px; " />
<input id="tx<?php echo $k; ?>" name="fn[]" type="text" value="<?php echo $rows[1]; ?>"  readonly style="width:150px; height:20px; " />
<input id="tk<?php echo $k; ?>" type="text" name="du[]" value="<?php echo $rows[2]; ?>" readonly style="width:30px; height:20px; " />
</div>
<?php
}

echo '</br>';
}//if
?>

</div>


<div  style="width:400px;height:450px;line-height:2em; overflow:scroll;padding:5px;background-color:#b4dff5;color:#714D03;border:4px double #DEBB07; margin-left:0px; margin-top:55px; text-align:center; float:left;"> 

<?php



if(isset($_POST['submit']))
{

   $sql="SELECT * FROM `f_status` WHERE status='0' ORDER BY `d_status` ASC  ";
$res= mysql_query($sql)or die(mysql_error());
   
   $num1=mysql_num_rows($res); 
?>
	 <input name="gp" type="text" value="FACULTIES NOT AVAILABLE"  readonly style="width:250px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" /> TOTAL <input name="gp" type="text" value="<?php echo $num1;?>"  readonly style="width:40px; height:25px; background-color:#def4ff; font-family: monospace; font-style: italic;font-size:15px; text-align:center;" /></br> 
	 <?php
while($rows=mysql_fetch_row($res))
{$k++;
?>
<div  style="margin-left:25px; "> 

<input name="c" type="checkbox" onchange="document.getElementById('tx<?php echo $k;?>').disabled = !this.checked;document.getElementById('th<?php echo $k;?>').disabled = !this.checked;document.getElementById('tk<?php echo $k;?>').disabled = !this.checked;" value="1" style=" width:21px; height:21px;"  />
<input id="th<?php echo $k; ?>" type="text" name="dpt[]" value="<?php echo $rows[0]; ?>" readonly style="width:30px; height:20px; "  disabled="disabled"/>
<input id="tx<?php echo $k; ?>" name="fn[]" type="text" value="<?php echo $rows[1]; ?>"  readonly style="width:150px; height:20px; "  disabled="disabled"/>
<input id="tk<?php echo $k; ?>" type="text" name="du[]" value="<?php echo $rows[2]; ?>" readonly style="width:30px; height:20px; "  disabled="disabled"/>
</div>
<?php
}

echo '</br>';
}//if
?>

</div>
 
 <div><INPUT TYPE="submit" VALUE="Submit" name="finish" style="width:191px; height:32px; float:left; border:hidden; margin-left:800px; margin-top:9px"  /></div>
</form>

</div></div></div>


</body>
</html>