<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Prebacivanje popravljenih uređaja iz servisa</h2>
				</div>
				<div class="polje">
					<form method="POST" action="../controler/process.php">
						<input type="hidden" name="operacija" value="vracanje_sa_servisa">
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
