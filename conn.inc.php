<?php
$conn_error="couldnt connect to database";
$mysql_host="localhost";
$mysql_username="root";
$mysql_pass="";
$mysql_db="dummy_test";
if(!@mysql_connect($mysql_host,$mysql_username,$mysql_pass)|| !mysql_select_db($mysql_db)) 
{
	die($conn_error);
}
echo "";
?>