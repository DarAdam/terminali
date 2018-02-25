<?php 
	include 'connect.php';

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



/*
	if ($conn->multy_query(substr($sql, 0, -1)) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
	$conn->close();		
 ?>