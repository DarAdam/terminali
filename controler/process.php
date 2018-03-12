<?php  

$datum = $_POST['datum'];
$operacija = $_POST['operacija'];
$terminal = array_values(array_diff($_POST['terminal'], ['']));
$qprox = array_values(array_diff($_POST['qprox'], ['']));
$napomena = $_POST['napomena'];

$broj_dokumenta = 'test';
//ukoliko ne postoji neki od uređaja upisaće ga u bazu i vratiti njegov novi ID
include 'unos_novog_uredjaja.php';

var_dump($id_uređaja);

// ---------- ZAVISNO OD OPERACIJE (OTVORENE STRANICE) DEFINIŠE PROMENLJIVE ------- 

switch ($operacija) {
	case 'izdavanje_iz_magacina':
		$polazna_lokacija = '1';
		$odredisna_lokacija = '3';
		break;

	case 'vracanje_sa_servisa':
		$polazna_lokacija = '2';
		$odredisna_lokacija = '1';
		break;

	case 'reklamacija':
		$polazna_lokacija = '3';
		$odredisna_lokacija = '2';
		break;

	case 'ostalo':
		$polazna_lokacija = $_POST['polazna_lokacija'];
		$odredisna_lokacija = $_POST['odredisna_lokacija'];
		break;

	case 'novi':
		$polazna_lokacija = '5';
		$odredisna_lokacija = '1';
		break;	

	case 'zamena_uređaja':
		$polazna_lokacija = '4';
		$odredisna_lokacija = '2';
		$napomena = $_POST['distributer'] . ', ' . $_POST['prodajno_mesto'] . '; Napomena:' . $_POST['napomena'];
		var_dump($id_uređaja);
		include 'unos_u_izmene_logovi.php';
		
		if ($_POST['terminal_novi'] != '') $terminal[0] = $_POST['terminal_novi'];
		if ($_POST['qprox_novi'] != '') $qprox[0] = $_POST['qprox_novi'];
		var_dump($_POST['terminal_novi']);
		var_dump($terminal);
		include 'unos_novog_uredjaja.php';
		$polazna_lokacija = '3';
		$odredisna_lokacija = '4';
	
	default:
		# code...
		break;
}

// ------- POZIVA KOMUNIKACIJU ZA BAZOM, ODNOSNO UNOS PODATAKA U BAZU -------
var_dump($id_uređaja);
include 'unos_u_izmene_logovi.php';

die;


header('Location: ../view/index.php?msg=1')
?>