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
<div style="text-align:center">
<h1>Dodaj godziny każdego pracownika<h1>
</div> 
<body>
<div style="text-align:center">
<form method="post" action="dodawanie_akcja.php">
<h2>Michał:
<input type="number" min="0" step="1" name='michal' style="width:50px;"/></br>
Mateusz: 
<input type="number" min="0" step="1" name='mateusz' style="width:50px;"/></br>
Karol: 
<input type="number" min="0" step="1" name='karol' style="width:50px;"/></br>
Szymon: 
<input type="number" min="0" step="1" name='szymon' style="width:50px;"/></br>
Data:
<input type="date" name='data'/></br></br>
<input type="submit" value="Dodaj godziny do bazy" style="width:160px; height:50px;"/><h2>
</form>
<form action="panel.php">
 <input type="submit" value='Panel główny' style="width:120px; height:50px;"/></br>
<?php
if(isset($_SESSION['b_dodawania']))
{
	echo $_SESSION['b_dodawania'];
}

if(isset($_SESSION['poprawne_dodanie']))
{
	echo $_SESSION['poprawne_dodanie'];
}

if(isset($_SESSION['b_zapytania']))
{
	echo $_SESSION['b_zapytania'];
}

?>

</div>


</body>


</html>



