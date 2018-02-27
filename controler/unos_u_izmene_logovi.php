<?php 
	include 'connect.php';

	foreach ($terminal as $serijski_broj) {
		$tip_uređaja = 'terminal';
		//proveri da li je uređaj na odgovarajućoj lokaciji:
		$test = $conn->query('SELECT lokacija FROM uredjaji_lokacija WHERE tip_uredjaja = "terminal" AND serijski_broj = "' . $serijski_broj . '";');
		$trenutna_lokacija = $test->fetch_assoc()['lokacija'];
		echo 'trenutna lokacija terminala: ' . $trenutna_lokacija . '<br>';
		if ($trenutna_lokacija != $polazna_lokacija && $polazna_lokacija != 'teren') {
			echo '<br>Nije dobar unos za terminal<br>';
			die;
		}

			
		

		//unesi podatak u bazu, u tabelu izmene_logovi
		$sql = "INSERT INTO izmene_logovi (datum, operacija, polazna_lokacija, odredisna_lokacija, tip_uredjaja, serijski_broj, napomena) VALUES ('$datum', '$operacija', '$polazna_lokacija', '$odredisna_lokacija', '$tip_uređaja', '$serijski_broj', '$napomena')";
		$conn->query($sql);
		
	}
	foreach ($qprox as $serijski_broj) {
		$tip_uređaja = 'q prox';
		$test = $conn->query('SELECT lokacija FROM uredjaji_lokacija WHERE tip_uredjaja = "q prox" AND serijski_broj = "' . $serijski_broj . '";');
		$trenutna_lokacija = $test->fetch_assoc()['lokacija'];
		echo 'trenutna lokacija qprox-a: ' . $trenutna_lokacija . '<br>';
		if ($trenutna_lokacija != $polazna_lokacija && $polazna_lokacija != 'teren') {
			echo '<br>Nije dobar unos za Qprox<br>';
			die;
		}

		$sql = "INSERT INTO izmene_logovi (datum, operacija, polazna_lokacija, odredisna_lokacija, tip_uredjaja, serijski_broj, napomena) VALUES ('$datum', '$operacija', '$polazna_lokacija', '$odredisna_lokacija', '$tip_uređaja', '$serijski_broj', '$napomena')";
		$conn->query($sql);
	}



/*
	if ($conn->multy_query(substr($sql, 0, -1)) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
	$conn->close();		
 ?>