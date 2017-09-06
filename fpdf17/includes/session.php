<?php 
session_start();
if(!isset($_SESSION['username']))
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
    
window.location.href ='exam cell automation.php';
 </SCRIPT>");
}

$un=$_SESSION['username'];
 ?>

