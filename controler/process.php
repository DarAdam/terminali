<?php  

$datum = $_POST['datum'];
$operacija = $_POST['operacija'];
$terminal = array_slice($_POST['terminal'], 0, array_search('', $_POST['terminal']));
$qprox = array_slice($_POST['qprox'], 0, array_search('', $_POST['qprox']));
$napomena = $_POST['napomena'];

// ---------- ZAVISNO OD OPERACIJE (OTVORENE STRANICE) DEFINIŠE PROMENLJIVE ------- 

switch ($operacija) {
	case 'izdavanje_iz_magacina':
		$polazna_lokacija = 'magacin';
		$odredisna_lokacija = 'serviser';
		break;

	case 'vracanje_sa_servisa':
		$polazna_lokacija = 'serv_lanus';
		$odredisna_lokacija = 'magacin';
		break;

	case 'reklamacija':
		$polazna_lokacija = 'serviser';
		$odredisna_lokacija = 'serv_lanus';
		break;

	case 'ostalo':
		$polazna_lokacija = $_POST['polazna_lokacija'];
		$odredisna_lokacija = $_POST['odredisna_lokacija'];
		break;

	case 'zamena_uređaja':
		$polazna_lokacija = 'teren';
		$odredisna_lokacija = 'serv_lanus';
		$napomena = $_POST['distributer'] . ', ' . $_POST['prodajno_mesto'] . '; Napomena:' . $_POST['napomena'];
		$terminal =$_POST['terminal'];
		$qprox = $_POST['qprox'];
		echo 'terminal stari:<br>';
		var_dump($terminal);
		echo 'qprox stari: <br>';
		var_dump($qprox);
		include 'unos_u_izmene_logovi.php';
		include 'unos_u_uredjaji_lokacija.php';
		if ($_POST['terminal_novi'] != '') $terminal[0] = $_POST['terminal_novi'];
		if ($_POST['qprox_novi'] != '') $qprox[0] = $_POST['qprox_novi'];
		$polazna_lokacija = 'serviser';
		$odredisna_lokacija = 'teren';
	
	default:
		# code...
		break;
}

echo $operacija . '<br>';
echo $polazna_lokacija . '<br>';
echo $odredisna_lokacija . '<br>';
echo $datum . '<br>';
var_dump($terminal);
var_dump($qprox);
echo $napomena . '<br>';

// ------- POZIVA KOMUNIKACIJU ZA BAZOM, ODNOSNO UNOS PODATAKA U BAZU -------
include 'unos_u_izmene_logovi.php';
include 'unos_u_uredjaji_lokacija.php';

?>