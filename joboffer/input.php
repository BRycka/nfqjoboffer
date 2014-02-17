<?php

namespace Funkcijos;

$XMLSTRING = file_get_contents('php://input');
include('funkcijos.php');

$xml = simplexml_load_string($XMLSTRING);
//print_r($xml);

if ($xml->action == 'getCategories') {
    $categories = kategorijos();
    require '../smarty/templates/input.phtml';
} else {
    $products = produktai($xml->params->catid);
    require '../smarty/templates/inputProducts.phtml';
}
