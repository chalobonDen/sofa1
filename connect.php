<?php
$server = "127.0.0.1:3307";
$user = "root";
$password = "";
$dbname = "project_sofa2";

$connect = mysqli_connect($server, $user, $password, $dbname);

if (!$connect)
{
   die ("ERROR\: Cannot connect to the database $dbname on server $server using username $user (" .mysqli_connect_errno(). ", ".mysqli_connect_error(). ")");
}
	//echo "connect";
mysqli_query($connect, "SET NAMES utf8");
?>