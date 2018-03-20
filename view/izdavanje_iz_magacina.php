<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Izdavanje ispravnih uređaja iz magacina</h2>
				</div>
				<div class="polje">
					<form method="POST" action="../controler/process.php" target="_blank">
						<input type="hidden" name="operacija" value="izdavanje_iz_magacina">
						<div>
							<label for="datum">Datum:</label>
							<input type="date" name="datum" id="datum">
						</div>
						<?php napravi_tabelu(10); ?>
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