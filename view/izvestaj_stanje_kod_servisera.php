<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Izveštaj o stanju uređaja kod servisera</h2>
				</div>
				<div id="izveštaj">

				<?php 
					izbroj_uređaje('magacin', 'terminal');
					izbroj_uređaje('magacin', 'q prox');
					echo 'Serijski brojevi uređaja su sledeći:';
					izvestaj('serviser');
					?>

				</div>
<?php include 'includes/footer.php' ?>