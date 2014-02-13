<?php
file_get_contents('php://input');

include('phpmyadmin.php');

$result = mysql_query("SELECT * FROM category");
$categories = array();
while ($row = mysql_fetch_array($result)) {
	$row['kiekis'] = kiekis($row['category_id']);
	$categories[] = $row;
//	echo "id: ".$row['category_id'];
//	echo "kiekis: ".$kiekis."\n";
}

function kiekis($id) {
	$result = mysql_query("SELECT COUNT(category_id) as category_id FROM product WHERE product.category_id = $id");
	while ($row = mysql_fetch_array($result)) {
		$kiekis = $row['category_id'];
	}
	return $kiekis;
}

require '../smarty/templates/input.phtml';
