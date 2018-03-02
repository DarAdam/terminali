<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Izveštaj o stanju uređaja u servisu Lanus</h2>
				</div>
				<div id="izveštaj">

				<?php 
					izbroj_uređaje('serv_lanus', 'terminal');
					izbroj_uređaje('serv_lanus', 'q prox');
					echo 'Serijski brojevi uređaja su sledeći:';
					izvestaj('serv_lanus');
					?>

				</div>
<?php include 'includes/footer.php' ?>