<?php 
	function napravi_tabelu($t) {
		echo '<table>
				<tr>
					<th>RB</th>
					<th>Terminal</th>
					<th>Qprox</th>
				</tr>';
		for ($i = 1; $i <= $t; $i++) {
			echo '<tr>
					<td>'.$i.'</td>
					<td><input type="text" name="terminal[]" id="terminal_'.$i.'"></td>
					<td><input type="text" name="qprox[]" id="qprox_'.$i.'"></td>
				</tr>';
		}	
		echo '<td><button>+</button></td>
				</tr>							
			</table>';
	}

	function izvestaj($lokacija) {
		include '../controler/connect.php';
		$sql = "SELECT * FROM uredjaji_lokacija WHERE lokacija ='$lokacija'";
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
	 	echo '</table>';
	}
 ?>