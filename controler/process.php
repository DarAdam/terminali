<?php  

$datum = $_POST['datum'];
$operacija = $_POST['operacija'];
$terminal = array();
$qprox = array();
$napomena = $_POST['napomena'];

//------ FORMIRA NIZ OD SERIJSKIH BROJEVA ZA TERMINALE I QPROX-E ------------ 
$a = 1;
while ($_POST['terminal_' . $a] != '') {
	array_push($terminal, $_POST['terminal_' . $a]);
	$a++;
}

$b = 1;
while ($_POST['qprox_' . $b] != '') {
	array_push($qprox, $_POST['qprox_' . $b]);
	$b++;
}

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
		var_dump($terminal);
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