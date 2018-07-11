<?php

include 'libraries/Tree.class.php';
$TreeObj = new tree();

if(!empty($id)) {
		$TreeObj->deleteTree($id);

	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>