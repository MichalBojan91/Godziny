<?php
session_start();

if(isset($_SESSION['sukces'])&&($_SESSION['sukces']==true))
{
	header("Location:panel.php");
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
<h1>Zaloguj się do panelu<h1>
</div> 
<body>
<div style="text-align:center">
<form method="post" action="login.php">
<h2>Login:</br>
<input type="text" name='login'/></br>
Hasło:</br>
<input type="password" name='haslo'/></br>
<input type="submit" value="Zaloguj"/><h2>
</form>

<?php

if(isset($_SESSION['b_logowania']))
{
	echo $_SESSION['b_logowania'];
}
?>
</div>


</body>


</html>






