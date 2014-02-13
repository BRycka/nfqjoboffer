<?php
include('phpmyadmin.php');

function kategorijos(){
	$result = mysql_query("SELECT * FROM category");
	$categories = array();
	while ($row = mysql_fetch_array($result)) {
		$categories[] = $row;
		kiekis($row['category_id']);
	}
	return $categories;
}

function kiekis($id) {
	$kiekis = 0;
	$result = mysql_query("SELECT COUNT(category_id) as category_id FROM product WHERE product.category_id = $id");
	while ($row = mysql_fetch_array($result)) {
		$kiekis = $row['category_id'];
	}
	return $kiekis;
}
