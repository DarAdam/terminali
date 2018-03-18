<!DOCTYPE html>
<html>
<head>
	<title>Optremnica</title>
	<link rel="stylesheet" type="text/css" href="stilovi/otpremnica.css">
</head>
<body>
	<div class="okvir">
		<div class="otpHead">
			<h3>APEX SOLUTION TECHNOLOGY DOO</h3>
			<h5>Makenzijeva 24</h5>
			<h5>11 000 Beograd, Srbija </h5>
			<h5>Matični Broj:  20514841</h5>
			<h5>PIB:  106037154</h5>
			<h5>Šifra Delatnosti: 7022</h5>
			<h5>Tekući Račun:  340-11005053-79, Erste Bank</h5>
			<hr>
		</div>
		<div class="otpNaslov">
			<h1>OTPREMNICA</h1>
			<?php 
				$broj_dokumenta = $_GET['broj'];
				echo "<h4>br. " . $broj_dokumenta . "</h4>";
			 ?>
		</div>
		<div class="otpTabela">
			<table>
				<tr>
					<th>RB</th>
					<th>Terminal</th>
					<th>Q prox</th>
				</tr>
				<?php 
					$terminal = '';
					$qprox = '';
					if (!empty($_GET['term'])) $terminal = explode(",", $_GET['term']);
					if (!empty($_GET['q'])) $qprox = explode(",", $_GET['q']);

					$broj_kolona = sizeof($terminal);
					if (sizeof($qprox) > $broj_kolona) $broj_kolona = sizeof($qprox);
					
					for ($i = 1; $i <= $broj_kolona; $i++) {
						echo "<tr>
								<td>".$i."</td>
								<td>";

								if (!empty($terminal[$i-1])) echo $terminal[$i-1];
						echo		"</td>
								<td>";
							
								if (!empty($qprox[$i-1])) echo $qprox[$i-1];
						echo			"</td>
							</tr>";
					}

				 ?>

			</table>
		</div>
		<div class="otpFooter">
			<hr>
			<h4>Robu izdao:</h4>
			<h4>Robu primio:</h4>
		</div>
		<div class="mp">
			<h4>M.P.</h4>
		</div>
	</div>
</body>
</html>
