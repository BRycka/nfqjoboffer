<?php
$XMLSTRING = file_get_contents('php://input');
include('funkcijos.php');

$xml=simplexml_load_string($XMLSTRING);
//print_r($xml);

if($xml->action == 'getCategories'){
	$categories = kategorijos();
	require '../smarty/templates/input.phtml';
}else{
	$products = produktai();
	require '../smarty/templates/inputProducts.phtml';
}

