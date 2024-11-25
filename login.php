<?php
session_start();
if(!isset($_POST['login']) AND !isset($_POST['haslo']))
{
	header("Location:index.php");
	exit();
}

require_once "connect.php"; 

$polacz= new mysqli($host, $db_user, $db_password, $db_name);
	if($polacz->errno!=0)
	{echo "Error".$polacz->errno;}
	else
	{
		$login=$_POST['login'];
		$haslo=$_POST['haslo'];
		$login=htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo=htmlentities($haslo, ENT_QUOTES, "UTF-8");
		
		
		if($t_log=$polacz->query(sprintf("SELECT * FROM administrator WHERE login='%s' AND haslo='%s'",
		mysqli_real_escape_string($polacz, $login),
		mysqli_real_escape_string($polacz, $haslo))))
		{
			$jest_w_bazie=$t_log->num_rows;
			if($jest_w_bazie>0)
			{
				$_SESSION['sukces']=true;
				$kolumna=$t_log->fetch_assoc();
				$_SESSION['admin']=$kolumna['login'];
				unset($_SESSION['b_logowania']);
				$t_log->free_result();
				header("Location:panel.php");
			}
			else
			{
				$_SESSION['b_logowania']='<span style="color:red">Niewłaściwy login lub hasło! Spróbuj ponownie</span>';
				header("Location:index.php");
			}
		}
	
	}

	$polacz->close();

?>
