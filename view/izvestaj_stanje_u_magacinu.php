<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Izveštaj o stanju uređaja u magacinu</h2>
				</div>
				<div id="izveštaj">

				<?php 
					izbroj_uređaje('1', 'terminal');
					izbroj_uređaje('1', 'q prox');
					echo 'Serijski brojevi uređaja su sledeći:';
					izvestaj('1');
					?>

				</div>
<?php include 'includes/footer.php' ?>