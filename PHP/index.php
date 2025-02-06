<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dzienik</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Dziennik</h1>
</div>
<div class="lewy">
	<div>
		<h3>Szukaj ucznia</h3>
		<form action="index.php" method="GET">
			Imie: <select name="imie">
				<?php
					wybierz();
				?>
			</select>
			<button type="submit">Szukaj</button>
		</form>
	</div>
	<hr>
	<div>
		<h3>Dodaj ucznia</h3>
		<form action="dodaj.php" method="POST">
			Imie: <input type="text" name="imie"><br>
			Nazwisko: <input type="text" name="nazwisko"><br>
			Wiek: <input type="number" name="wiek"><br>
			<button type="submit">Dodaj</button>
		</form>
	</div>
</div>
<div class="prawy">
	<h1>Lista Uczniów</h1>
	<?php
		skrypt();
	?>
</div>
<div class="stopka">Subskrybuj</div>
</body>
</html>

<?php
	function skrypt() {
		if(isset($_GET["imie"]) && $_GET["imie"] != "")
		{
			$conn = mysqli_connect("localhost", "root", "", "dziennik");
			if(!$conn)
			{
				echo "nie udało się połączyć z bazą danych";
				return;
			}
			$imieGet = $_GET["imie"]; 
			$sql = "SELECT imie, nazwisko, wiek FROM uczniowie WHERE imie = '$imieGet'";
			$res = mysqli_query($conn, $sql);

			while ($row = mysqli_fetch_row($res)) {
				echo "$row[0] $row[1] $row[2]<br>";
			}
			mysqli_close($conn);
			//print_r($row); pokazuje calą tablice (Array ( [0] => Kamil [1] => Ryba [2] => 11 ))
		}
		else
		{
			echo "wpisz imie ucznia";
		}
	}

	function wybierz()
	{
			$conn = mysqli_connect("localhost", "root", "", "dziennik");
			if(!$conn)
			{
				echo "nie udało się połączyć z bazą danych";
				return;
			}
			
			$sql = "SELECT imie FROM uczniowie";
			$res = mysqli_query($conn, $sql);

			while ($row = mysqli_fetch_row($res)) {
				echo "<option value='$row[0]'>$row[0]</option>";
			}
			mysqli_close($conn);
	}
?>
