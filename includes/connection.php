<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$host="localhost";
$pass="";
$uname="root";

$connection=mysql_connect($host,$uname,$pass);
if(!$connection)
{
die("Not Connected");
}
$result=mysql_select_db("project");
if(!$result)
{
die("Database Not selected");
}
?>
</body>
</html>
