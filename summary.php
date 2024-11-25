<?php
session_start();

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

<h2>UWAGA! ZEROWANIE STANU BAZY DANYCH! <h2>


<form action="zerowanie.php">
 <input type="submit" onclick="alert('Spowoduje to nieodwracalą utratę danych! Czy chcesz kontynuować?')" value="Reset bazy!" style="width:120px; height:50px; color:red;">
</form></br>

<form action="panel.php">
 <input type="submit" value='Panel główny' style="width:120px; height:50px;"/>
</form></br>
<form action="logout.php">
 <input type="submit" value='Wyloguj się' style="width:120px; height:50px;"/>
</form>

</div>


</body>


</html>
