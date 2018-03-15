<?php
	include 'connect.php';

	

//ubacivanje novih uređaja u tabelu "uređaji lokacija" i formiranje niza id_uređaja
	foreach ($terminal as $serijski_broj) {
		$tip_uređaja = 'terminal';
		$uredjaji_na_listi = $conn->query('SELECT * FROM uredjaji_lokacija WHERE tip_uredjaja = "' . $tip_uređaja . '" AND serijski_broj = "' . $serijski_broj . '"');
		switch ($uredjaji_na_listi->num_rows) {
			case 1:
				$row = $uredjaji_na_listi->fetch_assoc();
				array_push($id_uređaja, $row['id']);
				break;
			case 0:
				$conn->query("INSERT INTO uredjaji_lokacija (tip_uredjaja, serijski_broj) VALUES ('$tip_uređaja', '$serijski_broj')");
				$uredjaji_na_listi = $conn->query('SELECT * FROM uredjaji_lokacija WHERE tip_uredjaja = "' . $tip_uređaja . '" AND serijski_broj = "' . $serijski_broj . '"');
				$row = $uredjaji_na_listi->fetch_assoc();
				array_push($id_uređaja, $row['id']);
				break;
			
			default:
				header('Location: ../view/index.php?msg=12');
				break;
		}
	}
	
	foreach ($qprox as $serijski_broj) {
		$tip_uređaja = 'q prox';
		$uredjaji_na_listi = $conn->query('SELECT * FROM uredjaji_lokacija WHERE tip_uredjaja = "' . $tip_uređaja . '" AND serijski_broj = "' . $serijski_broj . '"');
		switch ($uredjaji_na_listi->num_rows) {
			case 1:
				$row = $uredjaji_na_listi->fetch_assoc();
				array_push($id_uređaja, $row['id']);
				break;
			case 0:
				$conn->query("INSERT INTO uredjaji_lokacija (tip_uredjaja, serijski_broj) VALUES ('$tip_uređaja', '$serijski_broj')");
				$uredjaji_na_listi = $conn->query('SELECT * FROM uredjaji_lokacija WHERE tip_uredjaja = "' . $tip_uređaja . '" AND serijski_broj = "' . $serijski_broj . '"');
				$row = $uredjaji_na_listi->fetch_assoc();
				array_push($id_uređaja, $row['id']);
				break;
			
			default:
				header('Location: ../view/index.php?msg=13');
				break;
		}
	}
	
		$conn->close();	
 ?>