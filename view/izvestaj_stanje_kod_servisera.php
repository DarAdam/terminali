<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Izveštaj o stanju uređaja kod servisera</h2>
				</div>
				<div id="izveštaj">

				<?php 
					izbroj_uređaje(3, 'terminal');
					izbroj_uređaje(3, 'q prox');
					echo 'Serijski brojevi uređaja su sledeći:';
					izvestaj(3);
					?>

				</div>
<?php include 'includes/footer.php' ?>