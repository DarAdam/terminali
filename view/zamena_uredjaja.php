<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Kreiranje radnog naloga za servisiranje uređaja na terenu</h2>
				</div>
				<div class="polje">
					<form method="POST" action="../controler/process.php">
						<input type="hidden" name="operacija" value="zamena_uređaja">
						<div>
							<label for="datum">Datum:</label>
							<input type="date" name="datum" id="datum">
						</div>
						<div>
							<label for="distributer">Distributer:</label>
							<input type="distributer" name="distributer" id="distributer">
							<label for="prodajno_mesto">Prodajno mesto:</label>
							<input type="prodajno_mesto" name="prodajno_mesto" id="prodajno_mesto">							
						</div>
						<table>
							<tr>
								<th></th>
								<th>Terminal</th>
								<th>Qprox</th>
							</tr>
							<tr>
								<td>stari uređaj</td>
								<td><input type="text" name="terminal[]"></td>
								<td><input type="text" name="qprox[]"></td>
							</tr>
							<tr>
								<td>novi uređaj</td>
								<td><input type="text" name="terminal_novi"></td>
								<td><input type="text" name="qprox_novi"></td>
							</tr>
						</table>
						<div>
							<label for="napomena">Napomena:</label>
							<input type="text" name="napomena" id="napomena">
						</div>
						<div>
							<input type="submit" value="Potvrdi">
							<input type="button" value="Napravi dokument">
						</div>
					</form>
				</div>
<?php include 'includes/footer.php' ?>