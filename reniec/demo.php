<?php
	require ("curl.php");
	require ("reniec.php");

	$persona = new Reniec();
	$dni     ="46907987";

	print_r( $persona->search($dni) );
?>
