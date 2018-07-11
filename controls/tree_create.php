<?php

include 'libraries/Tree.class.php';
$TreeObj = new tree();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('id','name','parent_id');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'id' => 6,
    'name' => 255,
    'parent_id' => 6
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array (
		'id' => 'anything',
        'name' => 'anything',
        'parent_id' => 'anything'
        );

	// sukuriame validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// atnaujiname duomenis
		$TreeObj->insertTree($dataPrepared);

		// nukreipiame į modelių puslapį
		header("Location: index.php?module={$module}&action=list");
		die();
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();
		// gauname įvestus laukus
		$data = $_POST;
	}
} else {
	// tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
	if(!empty($id)) {
		$data = $TreeObj->getTree($id);
	}
}

// įtraukiame šabloną
include 'templates/tree_form.tpl.php';

?>