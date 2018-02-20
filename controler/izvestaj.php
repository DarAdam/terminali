<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "terminali";

	$conn = new mysqli($servername, $username, $password, $dbname);

// tabela sa svim podacima
/*	$sql = "SELECT * FROM izmene_logovi";
	$result = $conn->query($sql);
    echo'<table>
    		<tr>
    			<th>ID</th>
    			<th>Tip Uređaja</th>
    			<th>Serijski broj</th>
    		</tr>';
	while($row = $result->fetch_assoc()) {
    	echo '<tr>
        		<td>' . $row["id"] . '</td>
        		<td>' . $row["tip_uredjaja"] . '</td>
        		<td>' . $row["serijski_broj"] . '</td>
        	</tr>';	
	   			};
 	echo '</table>';*/

 // pronađi određeni podatak iz tabele
 	$sql = "SELECT * FROM izmene_logovi WHERE tip_uredjaja = 'terminal' AND serijski_broj = '9685'";
	$result = $conn->query($sql);

	var_dump($result);

	$conn->close();


 ?>