<?php 
	function napravi_tabelu($t) {
		echo '<table id="tabela">
				<tr>
					<th>RB</th>
					<th>Terminal</th>
					<th>Qprox</th>
				</tr>';
		for ($i = 1; $i <= $t; $i++) {
			echo '<tr>
					<td>'.$i.'</td>
					<td><input type="text" name="terminal[]"></td>
					<td><input type="text" name="qprox[]"></td>
				</tr>';
		}	
		echo '<td><button type="button" id="dodajdugme" onclick="dodaj_red()">+</button></td>
				</tr>							
			</table>';
	}

	function izvestaj($lokacija) {
		include '../controler/connect.php';
		$sql = "SELECT *, DATE_FORMAT(datum_poslednje_promene,'%d.%m.%Y') AS niceDate FROM uredjaji_lokacija WHERE lokacija ='$lokacija' ORDER BY tip_uredjaja DESC, serijski_broj";
		$result = $conn->query($sql);
		//$sql = "SELECT "
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
	        		<td>' . $row["niceDate"] . '</td>
	        		<td>' . $row["napomena"] . '</td>  		
	        	</tr>';	
		   			};
	 	echo '</table>';
	}

	function izbroj_uređaje($lokacija, $tip) {
		include '../controler/connect.php';
		$sql = "SELECT COUNT(rb) FROM uredjaji_lokacija WHERE lokacija ='$lokacija' AND tip_uredjaja = '$tip'";
		$result = $conn->query($sql);
		$polje = implode($result->fetch_assoc());
		echo 'Ukupno uređaja tipa ' . $tip . ' ima ' . $polje . '.<br><br>';
	}

	function istorija_uređaja($tip, $serijski_broj) {
		include '../controler/connect.php';
		$sql = "SELECT * FROM izmene_logovi WHERE tip_uredjaja = '$tip' AND serijski_broj = '$serijski_broj'";
		$result = $conn->query($sql);
		echo'<table>
	    		<tr>
	    			<th>ID</th>
	    			<th>Datum</th>
	    			<th>Operacija</th>
	    			<th>Polazna lokacija</th>
	    			<th>Odredišna lokacija</th>
	    			<th>Tip uređaja</th>
	    			<th>Serijski broj</th>
	    			<th>Napomena</th>
	    		</tr>';
		while($row = $result->fetch_assoc()) {
	    	echo '<tr>
	        		<td>' . $row["id"] . '</td>
	        		<td>' . $row["datum"] . '</td>
	        		<td>' . $row["operacija"] . '</td>
	        		<td>' . $row["polazna_lokacija"] . '</td>
	        		<td>' . $row["odredisna_lokacija"] . '</td>
	        		<td>' . $row["tip_uredjaja"] . '</td> 
	        		<td>' . $row["serijski_broj"] . '</td>  
	        		<td>' . $row["napomena"] . '</td>  		
	        	</tr>';	
		   			};
		  echo '</table>';
	}
 ?>