<?php
	include 'connect.php';

	$unos = $conn->prepare("INSERT INTO uredjaji_lokacija (tip_uredjaja, serijski_broj, lokacija, datum_poslednje_promene, napomena) VALUES (?, ?, ?, ?, ?)");
	$unos->bind_param("sisss", $tip_uređaja, $serijski_broj, $odredisna_lokacija, $datum, $napomena);
	

	foreach ($terminal as $serijski_broj) {
		$tip_uređaja = 'terminal';
		$sql_provera_ser_broja = ('SELECT * FROM uredjaji_lokacija WHERE tip_uredjaja = "' . $tip_uređaja . '" AND serijski_broj = "' . $serijski_broj . '"');
		$broj_uredjaja_na_listi = $conn->query($sql_provera_ser_broja);
		switch ($broj_uredjaja_na_listi->num_rows) {
			case 1:
				$sql = 'UPDATE uredjaji_lokacija SET lokacija = "' . $odredisna_lokacija . '", datum_poslednje_promene = "' . $datum . '", napomena = "' . $napomena . '" WHERE tip_uredjaja = "' . $tip_uređaja . '" AND serijski_broj = "' . $serijski_broj . '"';
				$conn->query($sql);
				break;
			case 0:
				$unos->execute();
				break;
			
			default:
				header('Location: ../view/index.php?msg=12');
				break;
		}
	}
	foreach ($qprox as $serijski_broj) {
		$tip_uređaja = 'q prox';
		$sql_provera_ser_broja = ('SELECT * FROM uredjaji_lokacija WHERE tip_uredjaja = "' . $tip_uređaja . '" AND serijski_broj = "' . $serijski_broj . '"');
		$broj_uredjaja_na_listi = $conn->query($sql_provera_ser_broja);
		switch ($broj_uredjaja_na_listi->num_rows) {
			case 1:
				$sql = 'UPDATE uredjaji_lokacija SET lokacija = "' . $odredisna_lokacija . '", datum_poslednje_promene = "' . $datum . '", napomena = "' . $napomena . '" WHERE tip_uredjaja = "' . $tip_uređaja . '" AND serijski_broj = "' . $serijski_broj . '"';
				$conn->query($sql);
				break;
			case 0:
				$unos->execute();
				break;
			
			default:
				header('Location: ../view/index.php?msg=13');
				break;
		}
	}
	
	$unos->close();
	$conn->close();	
 ?>