<?php 
	include 'functions/funkcije.php';
 	include 'includes/header.php';
 	include 'includes/greske.php';
?>

			<div class="main_right" >
				<div class="main_head">
					<h2>Odaberite operaciju sa spiska sa leve strane</h2>
				</div>
				<div class="polje">
					<?php
					if (isset($_GET['msg'])){
						echo $msgs[$_GET['msg']];
					}
					 ?>
				</div>
<?php include 'includes/footer.php' ?>