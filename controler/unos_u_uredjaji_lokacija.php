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

	$unos = $conn->prepare("INSERT INTO uredjaji_lokacija (tip_uredjaja, serijski_broj, lokacija, datum_poslednje_promene, napomena) VALUES (?, ?, ?, ?, ?)");
	$unos->bind_param("sisss", $tip_uređaja, $serijski_broj, $odredisna_lokacija, $datum, $napomena);

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