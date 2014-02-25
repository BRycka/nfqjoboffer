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
include('funkcijos.php');
include('Request.php');
$nfq = new Nfq_Smarty();
$katPro = new KatPro();

$xmlString = file_get_contents('php://input');

$request = new Request($xmlString);

//$xml = simplexml_load_string($XMLSTRING);
//print_r($xml);
if ($request->getAction() == 'getCategories') {
    $categories = $katPro->kategorijos();
    $nfq->assign('categories', $categories);
    $nfq->display('categories.tpl');
} else {
//    echo "Parametrai " . $request->getParam('catid');
    $products = $katPro->produktai($request->getParam('catid'));
    $nfq->assign('products', $products);
    $nfq->display('product.tpl');
}


//request objektas, response objektas mvc. frontcontroller.