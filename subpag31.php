<?php include_once('includes/session.php'); 
include_once('includes/connection.php');
$q = intval($_GET['q']);
//echo $q." yahooooooooooooooooo";
$a=array('disabled','disabled','disabled','disabled');
$ckb=array('unchecked','unchecked','unchecked','unchecked');
$p=array('','','','');$st=array('','','','');
$e=array('','','','');

$d = array('','CS','EC','EEE','ME','IT','AEI');
$sql="SELECT * FROM `$un` WHERE dptname='$d[$q]'";
$result= mysql_query($sql)or die(mysql_error());

while($rows=mysql_fetch_row($result))
{
if($rows[1]=='s1/s2')
{//echo "1";
$p[0]=$rows[2];$st[0]=$rows[3];$e[0]=$rows[4];
$f=$rows[5];$a[0]='enabled';
$ckb[0]="checked";
}
else if($rows[1]=='s3/s4')
{//echo "2";
$p[1]=$rows[2];$st[1]=$rows[3];$e[1]=$rows[4];
$f=$rows[5];$a[1]='enabled';
$ckb[1]="checked";
}
else if($rows[1]=='s5/s6')
{//echo "3";
$p[2]=$rows[2];$st[2]=$rows[3];$e[2]=$rows[4];
$f=$rows[5];$ckb[2]="checked";$a[2]='enabled';
}
else
{//echo "4";
$p[3]=$rows[2];$st[3]=$rows[3];$e[3]=$rows[4];
$f=$rows[5];$ckb[3]="checked";$a[3]='enabled';
}


}
//echo $ckb[0];
//echo $ckb[1];
//echo $ckb[2];
//echo $ckb[3];
 
?>
<form action=""  method="post" enctype="multipart/form-data" >
<input type="hidden" name="f1" value="<?php echo $f; ?>" />
	<div id="cnt11">
    
   	  <div id="c11">
   	    <div id="cz11"><div id="txt21">Department name :</div></div><div id="qqq1"><div id="zx1"><select name="dpt" style=" margin-top:50px; margin-left:25px; width:225px; height:30px;">
       
  <option value="<?php echo $d[$q];?>"><?php echo $d[$q];?></option>
 </select></div> <div id="x1">
   	      <input type="button" name="close" id="button1" value="" onclick='show1();' style=" width:18px; height:17px; background-image:url(css/png/x.png);" />
   	    </div></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
        Sel. Dpt. Master Timetable:</div>
        <div id="c21"><div id="q51"><input  name="f" type="file"  style=" background-color:#def0f8;  border-color:#000000; margin-left:30px; margin-top:0px;" /></div></div>
        <div id="c31"><div id="cc0z"><div id="aa1"><input onchange="document.getElementById('t11').disabled = !this.checked; document.getElementById('t21').disabled = !this.checked; document.getElementById('t31').disabled = !this.checked; " name="ckb[]" type="checkbox" value="s1/s2" <?php echo $ckb[0]; ?> style=" width:21px; height:21px; margin-left:25px; margin-top:8px;" /></div><div id="bb1"><div id="txt31">s1/s2</div></div></div><div id="cc001" >
        
        


        <div id="q1z"><input id="t11"  name="p[]" type="text" value="<?php echo $p[0];?>"  <?php echo $a[0]; ?>  size="0" maxlength="100" style="width:135px; height:20px; margin-left:7px; margin-top:6px" /></div><div id="q2z"><input id="t21" <?php echo $a[0]; ?>  name="st[]" type="text" value="<?php echo $st[0];?>"   style="width:30px; height:20px; margin-left:29px; margin-top:6px;"/></div><div id="q31"><div id="txt11">to</div></div><div id="q41"><input id="t31" <?php echo $a[0]; ?>  name="e[]" type="text" value="<?php echo $e[0];?>"  style="width:30px; height:20px; margin-left:29px; margin-top:6px;"/></div>

        
        
        														</div></div>
                                                                
        <div id="c41"><div id="cc11"><div id="aa1"><input onchange="document.getElementById('u11').disabled = !this.checked; document.getElementById('u21').disabled = !this.checked; document.getElementById('u31').disabled = !this.checked; " name="ckb[]"  type="checkbox" <?php echo $ckb[1]; ?>  value="s3/s4"  style=" width:21px; height:21px; margin-left:25px; margin-top:8px;" /></div><div id="bb1"><div id="txt31">s3/s4</div></div></div><div id="cc011"> 
        
        
        <div id="q011"><input id="u11" <?php echo $a[1]; ?>   name="p[]" type="text" value="<?php echo $p[1];?>" size="0" maxlength="100" style="width:135px; height:20px; margin-left:7px; margin-top:6px" /></div><div id="q021"><input id="u21" <?php echo $a[1]; ?>   name="st[]" type="text"  value="<?php echo $st[1];?>" style="width:30px; height:20px; margin-left:29px; margin-top:6px;"/></div><div id="q031"><div id="txt11">to</div></div><div id="q041"><input id="u31" <?php echo $a[1]; ?>   name="e[]" type="text" value="<?php echo $e[1];?>"   style="width:30px; height:20px; margin-left:29px; margin-top:6px;"/></div>
      
        
        
        														</div></div>
        <div id="c51"><div id="cc21"><div id="aa1"><input onchange="document.getElementById('v11').disabled = !this.checked; document.getElementById('v21').disabled = !this.checked; document.getElementById('v31').disabled = !this.checked;"  name="ckb[]" type="checkbox" <?php echo $ckb[2]; ?>  value="s5/s6" size="30" style=" width:21px; height:21px; margin-left:25px; margin-top:8px;" /></div><div id="bb1"><div id="txt31">s5/s6</div></div></div><div id="cc021">
        
        
        <div id="q111"><input id="v11" <?php echo $a[2]; ?>   name="p[]" type="text" value="<?php echo $p[2];?>"   size="0" maxlength="100" style="width:135px; height:20px; margin-left:7px; margin-top:6px" /></div><div id="q121"><input id="v21" <?php echo $a[2]; ?>   name="st[]" type="text" value="<?php echo $st[2];?>"   style="width:30px; height:20px; margin-left:29px; margin-top:6px;"/></div><div id="q131"><div id="txt11">to</div></div><div id="q141"><input id="v31" <?php echo $a[2]; ?>   name="e[]" type="text" value="<?php echo $e[2];?>"  style="width:30px; height:20px; margin-left:29px; margin-top:6px;"/></div>
        
        
        														</div></div>
        <div id="c61"><div id="cc31"><div id="aaa1"><input onchange="document.getElementById('w11').disabled = !this.checked; document.getElementById('w21').disabled = !this.checked; document.getElementById('w31').disabled = !this.checked; "  name="ckb[]" type="checkbox"  <?php echo $ckb[3]; ?>  value="s7/s8" style=" width:21px; height:21px; margin-left:25px; margin-top:8px;" /></div><div id="bbb1"><div id="txt31">s7/s8</div></div></div><div id="cc031">
        
        
        <div id="q211"><input id="w11" <?php echo $a[3]; ?>   name="p[]" type="text" value="<?php echo $p[3];?>" size="0" maxlength="100" style="width:135px; height:20px; margin-left:7px; margin-top:6px" /></div><div id="q221"><input id="w21" <?php echo $a[3]; ?>   name="st[]" type="text" value="<?php echo $st[3];?>"  style="width:30px; height:20px; margin-left:29px; margin-top:6px;"/></div><div id="q231"><div id="txt11">to</div></div><div id="q241"><input id="w31" <?php echo $a[3]; ?>   name="e[]" type="text" value="<?php echo $e[3];?>"  style="width:30px; height:20px; margin-left:29px; margin-top:6px;"/></div>
        
        
        														</div></div>
                                                                
                                                                
                                                                <div id="xzz">
                                                                <div id="xz11">
                                                                
                                                                
                                                                <input name="delete" type="submit" value="Delete Dpt" style=" width:75px; height:25px;"/>
                                                               
                                                                </div>
                                                                <div id="xz21">
                                                                <input name="submit1"  type="submit" value="Save"  style=" width:75px; height:25px;"/></div>
                                                                </div>
        
        
    </div>
 </form>
