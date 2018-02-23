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
 ?>