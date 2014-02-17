<?php

include('phpmyadmin.php');
include('Category.php');
include('Product.php');

function kategorijos()
{
    $result = mysql_query(
        "SELECT category.*,
        (SELECT COUNT(1) FROM product WHERE product.category_id = category.category_id) AS kiekis
	FROM category"
    );
    /*$result = mysql_query("
        SELECT category.*, IF(product.product_id IS NOT NULL, COUNT(*), 0) AS kiekis
        FROM category
        LEFT JOIN product ON (product.category_id = category.category_id)
        GROUP BY category.category_id
    ");*/

    $categories = array();
    while ($row = mysql_fetch_array($result)) {
       // $categories[] = $row;
        $category = new Category();
        $category->category_id = $row['category_id'];
        $category->category_name = $row['category_name'];
        $category->products_count = $row['kiekis'];
        $categories[] = $category;
    }
    return $categories;
}

function produktai($catId)
{
    $result = mysql_query("SELECT * FROM product WHERE category_id = {$catId}");
    $products = array();
    while ($row = mysql_fetch_array($result)) {
        $row['pvm'] = round($row['price'] * 21 / 121, 2);
        //$products[] = $row;
        $product = new Product();
        $product->product_id = $row['product_id'];
        $product->category_id = $row['category_id'];
        $product->product_name = $row['product_name'];
        $product->price = $row['price'];
        $product->pvm = $row['pvm'];
        $products[] = $product;
    }
    return $products;
}