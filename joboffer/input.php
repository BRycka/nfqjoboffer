<?php
file_get_contents('php://input');

include('phpmyadmin.php');

$result = mysql_query("
	SELECT category.*, (SELECT COUNT(1) FROM product WHERE product.category_id = category.category_id) AS kiekis
	FROM category");
/*$result = mysql_query("
	SELECT category.*, IF(product.product_id IS NOT NULL, COUNT(*), 0) AS kiekis
	FROM category
	LEFT JOIN product ON (product.category_id = category.category_id)
	GROUP BY category.category_id
");*/

$categories = array();
while ($row = mysql_fetch_array($result)) {
	$categories[] = $row;
}

require '../smarty/templates/input.phtml';
