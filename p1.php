<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>exam cell automation</title>
<link href="css/exam cell automation.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0">
 <h0 style="position:absolute; top:14.58cm; left:24cm; color:#FF0000">
<?php
		 include_once('includes/connection.php');

if(isset($_SESSION['username']))
  unset($_SESSION['username']);


if (isset($_POST["sub"]))
                {
			
$un= $_POST['un'];
$p= $_POST['p'];


if($un==''|| $p=='')
{echo "<b>fill the datas!!</b><br />";
}

else 
{

$sql="SELECT * FROM `user` WHERE un='$un' and p='".md5($_POST['p'])."'";
$result= mysql_query($sql)or die(mysql_error());

$count=mysql_num_rows($result);


if($count<1)
{   
  echo "<b>Incorrect username or password!!</b><br />";
}


else
{
//echo "oke done";


    $_SESSION['username'] = $un;

//header('Location: qst0.php');    

echo ("<SCRIPT LANGUAGE='JavaScript'>
    
window.location.href ='p2.php';
 </SCRIPT>");

  exit();

}

}

}

?>
          
</h0>

<div id="background1">

	                 <div id="header1">
                     </div>
                        
                        
	                 <div id="cnt">
    			                  <div id="cnt1">
                        			            <div id="cnt11">
                                                </div>	
                        
                                  </div>
                                  
                                  <div id="cnt2">
                                                <div id="cnt22">
                                                               <div id="cnt23">
                                                                              <div id="login">
                                                                              </div> 
                                                                              
                                                                              
   
 <FORM METHOD="POST"  action="">                                                                             
                                                                              <div id="username">
                                                                              
                                                                                       <div id="u1"></div>
                                                                                       <div id="u2"><input name="un"
                                                                                        type="text" maxlength="100" 
                                                                                         style="margin-left:3px; margin-top:10px;
                                                                                          height:22px; width:113px;"/></div>
                                                                              </div>
                                                                              
                                                                              <div id="password">
                                                                                
                                                                                        <div id="p1"></div>
                                                                                        <div id="p2"><input name="p"
                                                                                        type="password" maxlength="100" 
                                                                                         style="margin-left:3px; margin-top:10px;
                                                                                          height:22px; width:113px;"/></div>
                                                                                       
                                                                              </div>
                                                                              
                                                                               <div id="signin"><input name="sub" type="submit" value="" style=" width:71px; height:28px; background-image:url(css/png/sign-in.png); border:0;" /></div>
                                                                               </FORM>
                                                                            
                                                                </div>
                                                
                                                </div>
                                                 
                                                <div id="text1">
                                                If You Not Registerd [&nbsp;&nbsp;<a class="txt1" href="/project/p0.php"><i>Resgister Now</i></a>&nbsp;&nbsp;]
                                                </div> 
                                                 
                                                 
                                                 
                                  </div>
	                 </div>                        						

				



</div>





</body>
</html>
