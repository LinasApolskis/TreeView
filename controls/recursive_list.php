<?php

// sukuriame modelių klasės objektą
include 'libraries/Tree.class.php';
$TreeObj = new tree();

$data = $TreeObj->getTreeList();

// įtraukiame šabloną
include 'templates/recursive_list.tpl.php';
	
?>