<?php
session_start();

if($_POST['michal']==NULL || $_POST['mateusz']==NULL||$_POST['karol']==NULL || $_POST['szymon']==NULL ||$_POST['data']==NULL )
{
	$_SESSION['b_dodawania']='<span style="color:red">Podaj godziny wszytskich pracowników!';//błąd dodawania wyświetl komunikat
	header("Location:dodawanie.php");
	exit();
}

require_once "connect.php"; 

$dodaj_conn= new mysqli($host, $db_user, $db_password, $db_name);
	if($dodaj_conn->errno!=0)
	{echo "Error".$dodaj_conn->errno;}
else
{
$michal=$_POST['michal'];
$mateusz=$_POST['mateusz'];
$karol=$_POST['karol'];
$szymon=$_POST['szymon'];
$data=$_POST['data'];
if($dodaj=$dodaj_conn->query("INSERT INTO godziny VALUES(NULL,'$michal', '$mateusz', '$karol','$szymon','$data')"))
{  
	unset($_SESSION['b_dodawania']);
	$_SESSION['poprawne_dodanie']='<span style="color:red">Godziny dodane do bazy! Wróć do panelu głównego lub oddawaj dalej';
	header('Location:dodawanie.php');
	
}
else
{
	$_SESSION['b_zapytania']='<span style="color:red">Błąd bazy danych, prosimy spróbować ponownie';
	
}

}


$dodaj_conn->close();


?>