<?php 
	include 'connect.php';

// tabela sa svim podacima
/*	$sql = "SELECT * FROM uredjaji_lokacija";
	$result = $conn->query($sql);
    echo'<table>
    		<tr>
    			<th>RB</th>
    			<th>Tip Uređaja</th>
    			<th>Serijski broj</th>
    			<th>Lokacija</th>
    			<th>Datum poslednje promene</th>
    			<th>Napomena</th>
    		</tr>';
	while($row = $result->fetch_assoc()) {
    	echo '<tr>
        		<td>' . $row["rb"] . '</td>
        		<td>' . $row["tip_uredjaja"] . '</td>
        		<td>' . $row["serijski_broj"] . '</td>
        		<td>' . $row["lokacija"] . '</td>
        		<td>' . $row["datum_poslednje_promene"] . '</td>
        		<td>' . $row["napomena"] . '</td>  		
        	</tr>';	
	   			};
 	echo '</table>';*/

 // pronađi određeni podatak iz tabele
/* 	$sql = "SELECT * FROM izmene_logovi WHERE tip_uredjaja = 'terminal' AND serijski_broj = '9685'";
	$result = $conn->query($sql);

	var_dump($result);*/

	//$conn->close();



 ?>