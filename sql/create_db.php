<?php 
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// -------------------------------------- Napravi bazu za terminale   ----------------------------------------
$sql = "CREATE DATABASE terminali CHARACTER SET utf8 COLLATE utf8_unicode_ci";
if ($conn->query($sql) === TRUE) {
    echo "Uspešno kreirana baza podataka";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

echo '<br><br><br>';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "terminali";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//  --------------------------------sql za kreiranje prve tabele   ------------------------------------------
$sql = "CREATE TABLE uredjaji_lokacija (
rb INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
tip_uredjaja VARCHAR(30) NOT NULL,
serijski_broj VARCHAR(30) NOT NULL,
lokacija VARCHAR(50),
datum_poslednje_promene TIMESTAMP,
napomena VARCHAR(150)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela uređaji_lokacija je uspešno kreirana";
} else {
    echo "Error creating table: " . $conn->error;
}

echo '<br><br><br>';

// ----------------------------------   sql za kreiranje druge tabele  -------------------------------
$sql = "CREATE TABLE izmene_logovi (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
datum VARCHAR(30) NOT NULL,
operacija VARCHAR(30) NOT NULL,
polazna_lokacija VARCHAR(30) NOT NULL,
odredisna_lokacija VARCHAR(30) NOT NULL,
tip_uredjaja VARCHAR(30) NOT NULL,
serijski_broj VARCHAR(30) NOT NULL,
napomena VARCHAR(150)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela izmene_logovi je uspešno kreirana";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
 ?>