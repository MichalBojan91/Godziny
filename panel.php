<?php
session_start();
unset($_SESSION['poprawne_dodanie']);
if(!isset($_SESSION['sukces']))
{
	header("Location:index.php");
	exit();
}

?>



<!DOCTYPE html>
<html  lang="pl">
<head>
<meta charset="UTF-8"/>
<title>Elektrycy znad Silnicy</title>
<style>
        body {
            background-image: url('login.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
        }
    </style>

</head>
<body>
<div style="text-align:center">
<?php

echo "<h2>Witaj ".$_SESSION['admin'].". Co dzisiaj robimy?<h2></br>";
?>
<form action="dodawanie.php">
 <input type="submit" value='Dodaj godziny' style="width:120px; height:50px;"/>
</form>	</br>
<form action="check.php">
 <input type="submit" value='Sprawdź aktualny stan' style="width:120px; height:50px;"/>
</form></br>
<form action="summary.php">
 <input type="submit" value='Zakończ miesiąc' style="width:120px; height:50px;"/>
</form></br>
<form action="logout.php">
 <input type="submit" value='Wyloguj się' style="width:120px; height:50px;"/>
</form>


	

</div>


</body>


</html>