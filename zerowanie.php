<?php
if(!isset($_SESSION['sukces']))
{
	header("Location:index.php");
	exit();
}



require_once "connect.php"; 

$check_conn= new mysqli($host, $db_user, $db_password, $db_name);
	if($check_conn->errno!=0)
	{echo "Error".$check_conn->errno;}
    else
		{
			$zerowanie=$check_conn->query("TRUNCATE TABLE godziny");
		}
$check_conn->close();


header("Location:panel.php");



?>