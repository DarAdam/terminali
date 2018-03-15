<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Izveštaj o stanju uređaja u servisu Lanus</h2>
				</div>
				<div id="izveštaj">

				<?php 
					izbroj_uređaje('2', 'terminal');
					izbroj_uređaje('2', 'q prox');
					echo 'Serijski brojevi uređaja su sledeći:';
					izvestaj('2');
					?>

				</div>
<?php include 'includes/footer.php' ?>