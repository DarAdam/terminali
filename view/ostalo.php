<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Vanredno prebacivanje uređaja</h2>
				</div>
				<div class="polje">
					<form method="POST" action="../controler/process.php">
						<input type="hidden" name="operacija" value="ostalo">
						<div>
							<label for="datum">Datum:</label>
							<input type="date" name="datum" id="datum">
						</div>
						<?php napravi_tabelu(2); ?>
						<div>
							<label for="polazna_lokacija">Polazna lokacija:</label>
							<input type="polazna_lokacija" name="polazna_lokacija" id="polazna_lokacija">
						</div>
						<div>
							<label for="odredisna_lokacija">Odredišna lokacija:</label>
							<input type="odredisna_lokacija" name="odredisna_lokacija" id="odredisna_lokacija">
						</div>
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