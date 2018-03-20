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
		$sql = "SELECT tip_uredjaja, serijski_broj, lokacija, DATE_FORMAT(datum_poslednje_promene,'%d.%m.%Y') AS niceDate, napomena FROM 	 uredjaji_lokacija 
				INNER JOIN lokacije 
				ON uredjaji_lokacija.ID_lokacija = lokacije.id 
				WHERE ID_lokacija = $lokacija ORDER BY tip_uredjaja DESC";

		$result = $conn->query($sql);
		
		echo'<table>
	    		<tr>
	    			<th>Tip Uređaja</th>
	    			<th>Serijski broj</th>
	    			<th>Lokacija</th>
	    			<th>Datum poslednje promene</th>
	    			<th>Napomena</th>
	    		</tr>';
		while($row = $result->fetch_assoc()) {
	    	echo '<tr>
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
		$sql = "SELECT COUNT(id) FROM uredjaji_lokacija WHERE ID_lokacija ='$lokacija' AND tip_uredjaja = '$tip'";
		$result = $conn->query($sql);
		$polje = implode($result->fetch_assoc());
		echo 'Ukupno uređaja tipa ' . $tip . ' ima ' . $polje . '.<br><br>';
	}

	function istorija_uređaja($tip, $serijski_broj) {
		include '../controler/connect.php';
		$sql = "SELECT izmene_logovi.datum, izmene_logovi.operacija, izmene_logovi.napomena, izmene_logovi.broj_dokumenta, DATE_FORMAT(datum_poslednje_promene,'%d.%m.%Y') AS niceDate FROM izmene_logovi INNER JOIN uredjaji_lokacija on izmene_logovi.ID_uredjaja = uredjaji_lokacija.id WHERE tip_uredjaja = '$tip' AND serijski_broj = '$serijski_broj'";
		$result = $conn->query($sql);
		
		echo'<table>
	    		<tr>
	    			<th>Datum</th>
	    			<th>Operacija</th>
	    			<th>Napomena</th>
	    		</tr>';
		while($row = $result->fetch_assoc()) {
	    	echo '<tr>
	        		<td>' . $row["niceDate"] . '</td>
	        		<td>' . $row["operacija"] . '</td>
	        		<td>' . $row["napomena"] . '</td>  		
	        	</tr>';	
		   			};
		  echo '</table>';
	}

	function odabir_lokacije($sifra, $label) {
		include '../controler/connect.php';
		$sql = "SELECT * FROM lokacije ";
		$result = $conn->query($sql);
		$row = $result->fetch_all();
		
		echo '<div>
			<label for="'.$sifra.'">'.$label.'</label>
			<select name="'.$sifra.'">';

			foreach ($row as $key => $value) {
						echo '<option value="'.$value[0].'">'.$value[1].'</option>;';
					}		
				
		echo '</select>
			</div>';
	}
 ?>