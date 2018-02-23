<?php include 'functions/funkcije.php' ?>
<?php include 'includes/header.php' ?>
			<div class="main_right" >
				<div class="main_head">
					<h2>Izveštaj o stanju uređaja u magacinu</h2>
				</div>
				<div class="izveštaj">

<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "terminali";

	$conn = new mysqli($servername, $username, $password, $dbname);

// tabela sa svim podacima
	$sql = "SELECT * FROM uredjaji_lokacija";
	$result = $conn->query($sql);
    echo'<table class="izveštaj">
    		<tr>
    			<th>RB</th>
    			<th>Tip Uređaja</th>
    			<th>Serijski broj</th>
    			<th>Lokacija</th>
    		</tr>';
	while($row = $result->fetch_assoc()) {
    	echo '<tr>
        		<td>' . $row["rb"] . '</td>
        		<td>' . $row["tip_uredjaja"] . '</td>
        		<td>' . $row["serijski_broj"] . '</td>
        		<td>' . $row["lokacija"] . '</td>
        	</tr>';	
	   			};
 	echo '</table>'; ?>





				</div>
<?php include 'includes/footer.php' ?>