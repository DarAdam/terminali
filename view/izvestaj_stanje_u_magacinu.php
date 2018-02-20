<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Izveštaj o stanju uređaja u magacinu</h2>
				</div>
				<div class="polje">

<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "terminali";

	$conn = new mysqli($servername, $username, $password, $dbname);

// tabela sa svim podacima
	$sql = "SELECT * FROM izmene_logovi";
	$result = $conn->query($sql);
    echo'<table>
    		<tr>
    			<th>ID</th>
    			<th>Tip Uređaja</th>
    			<th>Serijski broj</th>
    		</tr>';
	while($row = $result->fetch_assoc()) {
    	echo '<tr>
        		<td>' . $row["id"] . '</td>
        		<td>' . $row["tip_uredjaja"] . '</td>
        		<td>' . $row["serijski_broj"] . '</td>
        	</tr>';	
	   			};
 	echo '</table>'; ?>





				</div>
<?php include 'includes/footer.php' ?>