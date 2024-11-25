<?php
session_start();

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
		$sql_michal="SELECT SUM(Michal) AS suma_mi FROM godziny";
		$sql_mateusz="SELECT SUM(Mateusz) AS suma_ma FROM godziny";
		$sql_karol="SELECT SUM(Karol) AS suma_ka FROM godziny";
		$sql_szymon="SELECT SUM(Szymon) AS suma_sz FROM godziny";
		$sql_data="SELECT data FROM godziny ORDER BY data DESC LIMIT 1";
		$rezultat_mi=$check_conn->query($sql_michal);
		$rezultat_ma=$check_conn->query($sql_mateusz); 
		$rezultat_ka=$check_conn->query($sql_karol);
		$rezultat_sz=$check_conn->query($sql_szymon);
		$rezultat_data=$check_conn->query($sql_data);
				//michał
			if($rezultat_mi->num_rows>0)
			{
				$row_Mi=$rezultat_mi->fetch_assoc();
				$suma_Mi=(int)$row_Mi['suma_mi'];
				
				//echo "Michał: ".$suma_Mi."</br>";
			}
			//mateusz
			if($rezultat_ma->num_rows>0)
			{
				$row_Ma=$rezultat_ma->fetch_assoc();
				$suma_Ma=(int)$row_Ma['suma_ma'];
				$rezultat_ma->free();
				//echo "Mateusz: ".$suma_Mi."</br>";
			}
			//Karol
			if($rezultat_ka->num_rows>0)
			{
				$row_Ka=$rezultat_ka->fetch_assoc();
				$suma_Ka=(int)$row_Ka['suma_ka'];
				$rezultat_ka->free();
				//echo "Karol: ".$suma_Ka."</br>";
			}
			//Szymon
			if($rezultat_sz->num_rows>0)
			{
				$row_Sz=$rezultat_sz->fetch_assoc();
				$suma_Sz=(int)$row_Sz['suma_sz'];
				$rezultat_sz->free();
				//echo "Szymon: ".$suma_Sz."</br>";
			}
			//Data
			if($rezultat_data->num_rows>0)
			{
				$row_data=$rezultat_data->fetch_assoc();
				$a_data=(string)$row_data['data'];
				$rezultat_data->free();
				//echo "Data: ".$a_data."</br>";
			}
		  $suma_miesiac=$suma_Mi+$suma_Ma+$suma_Ka+$suma_Sz;
		
		}
$check_conn->close();
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
		@media print {
            body { font-family: Arial, sans-serif; }
            .noprint { display: none; }
        }
    </style>

</head>
<body>
<div style="text-align:center">
<?php
if(isset($a_data))
{
	echo"<h2>STAN GODZINOWY NA DZIEŃ: ".$a_data."<h2>";
//</br>
}

?>

<table align="center", border-collapse: collapse, border="1", cellpadding="10", cellspacing="1">
<tr><td>Michał</td><td><?php echo $suma_Mi?></td></tr>
<tr><td>Mateusz</td><td><?php echo $suma_Ma?></td></tr>
<tr><td>Karol</td><td><?php echo $suma_Ka?></td></tr>
<tr><td>Szymon</td><td><?php echo $suma_Sz?></td></tr>
<tr>SUMA GODZIN:<?php echo $suma_miesiac?>  </tr></table>
</br>

<form action="panel.php">
 <input type="submit" class="noprint" value='Panel główny' style="width:120px; height:50px;"/>
</form></br>
<form action="logout.php">
 <input type="submit" class="noprint" value='Wyloguj się' style="width:120px; height:50px;"/>
</form>
</br>
<button class="noprint" onclick="window.print()" style="width:120px; height:50px;">Drukuj</button>
</div>


</body>


</html>
