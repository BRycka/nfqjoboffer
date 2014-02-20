<?php
/**
 * Project: Nfq Smarty Application
 * Author: RicBlt
 * File: input.php
 * Version: 1.1
 */

// define our application directory
define('NFQ_DIR', '/home/ricblt/workspace/nfq/');
// define smarty lib directory
define('SMARTY_DIR', '/home/ricblt/workspace/nfq/Smarty-3.1.16/libs/');
// include the setup script
include(NFQ_DIR . 'joboffer/nfq_setup.php');

$nfq = new Nfq_Smarty();

$XMLSTRING = file_get_contents('php://input');
include('funkcijos.php');

$xml = simplexml_load_string($XMLSTRING);
//print_r($xml);

if ($xml->action == 'getCategories') {
    $categories = kategorijos();
    $nfq->assign('categories', $categories);
    $nfq->display('categories.tpl');
} else {
    $products = produktai($xml->params->catid);
    $nfq->assign('products', $products);
    $nfq->display('product.tpl');
}
