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
include(NFQ_DIR . 'joboffer/Model/nfq_setup.php');
require_once('Core/Request.php');
require_once('Core/FrontController.php');
require_once('Core/Db.php');

$db = new \joboffer\Core\Db('root', '', 'nfq');
\joboffer\Core\Db::setDefaultInstance($db);

$xmlString = file_get_contents('php://input');
$request = new \joboffer\Core\Request($xmlString);

$front = new \joboffer\Core\FrontController();
echo $front->dispatch($request);
