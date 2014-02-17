<?php

include('phpmyadmin.php');
include('Category.php');
include('Product.php');

function kategorijos()
{
    $result = mysql_query(
        "SELECT category.*,
        (SELECT COUNT(1) FROM product WHERE product.category_id = category.category_id) AS products_count
	FROM category"
    );
    /*$result = mysql_query("
        SELECT category.*, IF(product.product_id IS NOT NULL, COUNT(*), 0) AS kiekis
        FROM category
        LEFT JOIN product ON (product.category_id = category.category_id)
        GROUP BY category.category_id
    ");*/

    $categories = array();
    while ($category = mysql_fetch_object($result, 'Category')) {
        $categories[] = $category;
    }
    return $categories;
}

function produktai($catId)
{
    $result = mysql_query("SELECT * FROM product WHERE category_id = {$catId}");
    $products = array();
    while ($product = mysql_fetch_object($result, 'Product')) {
        $products[] = $product;
    }
    return $products;
}