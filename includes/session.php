<?php 
session_start();
if(!isset($_SESSION['username']))
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
    
window.location.href ='p1.php';
 </SCRIPT>");
}

$un=$_SESSION['username'];
 ?>

