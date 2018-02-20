<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "terminali";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
			die( "Konekcija neuspešna: " . $conn->connect_error);
		} else {
			echo "Konekcija uspešna <br><br>";
		};

	$unos = $conn->prepare("INSERT INTO izmene_logovi (datum, operacija, polazna_lokacija, odredisna_lokacija, tip_uredjaja, serijski_broj, napomena) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$unos->bind_param("sssssis", $datum, $operacija, $polazna_lokacija, $odredisna_lokacija, $tip_uređaja, $serijski_broj, $napomena);

	foreach ($terminal as $serijski_broj) {
		$tip_uređaja = 'terminal';	
		$unos->execute();
	}
	foreach ($qprox as $serijski_broj) {
		$tip_uređaja = 'q prox';	
		$unos->execute();
	}

	$unos->close();
	$conn->close();		
 ?>