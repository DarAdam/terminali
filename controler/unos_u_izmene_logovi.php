<?php 
	include 'connect.php';

	//proveri da li je uređaj na odgovarajućoj lokaciji:
	foreach ($id_uređaja as $broj) {
		$test = $conn->query('SELECT ID_lokacija FROM uredjaji_lokacija WHERE id = "' . $broj . '";');
		$row = $test->fetch_assoc();
										
		if (is_null ($row['ID_lokacija'])) {
			$trenutna_lokacija = '';
		} else {
			$trenutna_lokacija = $row['ID_lokacija'];
		}
		var_dump($trenutna_lokacija);die;
		if ($trenutna_lokacija != $polazna_lokacija && $polazna_lokacija != '4' && $polazna_lokacija != '5') {
			header('Location: ../view/index.php?msg=10');
			die;
		}
	}
	

	//unesi podatak u bazu, u tabelu izmene_logovi		
	foreach ($id_uređaja as $broj) {
		$sql = "INSERT INTO izmene_logovi (datum, operacija, ID_polazna_lokacija, ID_odredisna_lokacija, ID_uredjaja, napomena, broj_dokumenta) VALUES ('$datum', '$operacija', '$polazna_lokacija', '$odredisna_lokacija', '$broj', '$napomena', '$broj_dokumenta')";
		$conn->query($sql);

		$sql = "UPDATE uredjaji_lokacija SET ID_lokacija = '".$odredisna_lokacija."' , datum_poslednje_promene = '".$datum."', napomena = '".$napomena."' WHERE id = '".$broj."';";
		$conn->query($sql);
	}
	
	$conn->close();		
 ?>