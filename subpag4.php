<?php include_once('includes/session.php'); 
include_once('includes/connection.php');
$q = intval($_GET['q']);
$sql1="SELECT * FROM `grp_$un` WHERE id='$q'";
$result1= mysql_query($sql1)or die(mysql_error());
$rows1=mysql_fetch_row($result1);

?>

<form action=""  method="post" enctype="multipart/form-data" >

<div  style="width:400px;height:124px;line-height:2em; padding:5px;background-color:#b4dff5;color:#714D03;border:4px ; margin-left:0px; margin-top:-10px;"> 


GROUP WHICH ROOM INCLUDE: <input name="gp" type="text" value="<?php echo $rows1[0];?>"  readonly style="width:100px; height:20px; background-color:#def4ff;" />
<input type="submit" name="" value="X" style="height:20px;width:20px;border-radius: 15px;
border-color:#000000;background-color:#D5DDF7;
font-style: italic;font-size:5px; margin-left:400px; margin-top:-40px;" ></br>


ROOM NAME:<input name="rn" type="text" value="<?php echo $rows1[1]; ?>" style="width:100px; height:20px; background-color:#def4ff;" />
<input type="hidden" name="id" value="<?php echo $q; ?>" /></br>

NUMBER OF BENCHES CONTAIN:<input name="bn" type="text" value="<?php echo $rows1[2];?>" style="width:100px; height:20px; background-color:#def4ff;" /> </br>

EACH BENCH STRENGTH:<select name="str" style="width:40px; height:20px;" />
<option value="<?php echo $rows1[3]; ?>" ><?php echo $rows1[3]; ?> </option>
<option value="2">2</option>
<option value="1">1</option>
</select></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="delete1" value="DELETE ROOM" style="height:20px;width:100px;border-radius: 15px;
border-color:#000000;background-color:#D5DDF7;
font-style: italic;font-size:10px;" >

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="sub2" value="SAVE CHANGES" style="height:20px;width:100px;border-radius: 15px;
border-color:#000000;background-color:#D5DDF7;
font-style: italic;font-size:10px;" >


</div>
</form>
