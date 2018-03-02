<?php 
	include 'connect.php';

	//proveri da li je uređaj na odgovarajućoj lokaciji:
	foreach ($terminal as $serijski_broj) {
		$tip_uređaja = 'terminal';
		$test = $conn->query('SELECT lokacija FROM uredjaji_lokacija WHERE tip_uredjaja = "terminal" AND serijski_broj = "' . $serijski_broj . '";');
		$row = $test->fetch_assoc();
						
		if (is_null ($row['lokacija'])) {
			$trenutna_lokacija = '';
		} else {
			$trenutna_lokacija = $row['lokacija'];
		}
		if ($trenutna_lokacija != $polazna_lokacija && $polazna_lokacija != 'teren' && $polazna_lokacija != 'nabavka') {
			header('Location: ../view/index.php?msg=10');
			die;
		}
	}
	foreach ($qprox as $serijski_broj) {
		$tip_uređaja = 'q prox';
		$test = $conn->query('SELECT lokacija FROM uredjaji_lokacija WHERE tip_uredjaja = "q prox" AND serijski_broj = "' . $serijski_broj . '";');
		$row = $test->fetch_assoc();				
		if (is_null ($row['lokacija'])) {
			$trenutna_lokacija = '';
		} else {
			$trenutna_lokacija = $row['lokacija'];
		}
		if ($trenutna_lokacija != $polazna_lokacija && $polazna_lokacija != 'teren' && $polazna_lokacija != 'nabavka') {
			header('Location: ../view/index.php?msg=11');
			die;
		}
	}

	//unesi podatak u bazu, u tabelu izmene_logovi		
	foreach ($terminal as $serijski_broj) {
		$tip_uređaja = 'terminal';
		$sql = "INSERT INTO izmene_logovi (datum, operacija, polazna_lokacija, odredisna_lokacija, tip_uredjaja, serijski_broj, napomena) VALUES ('$datum', '$operacija', '$polazna_lokacija', '$odredisna_lokacija', '$tip_uređaja', '$serijski_broj', '$napomena')";
		$conn->query($sql);
	}
	foreach ($qprox as $serijski_broj) {
		$tip_uređaja = 'q prox';
		$sql = "INSERT INTO izmene_logovi (datum, operacija, polazna_lokacija, odredisna_lokacija, tip_uredjaja, serijski_broj, napomena) VALUES ('$datum', '$operacija', '$polazna_lokacija', '$odredisna_lokacija', '$tip_uređaja', '$serijski_broj', '$napomena')";
		$conn->query($sql);
	}

	$conn->close();		
 ?>