<?php

// put full path to Smarty.class.php
require('../Smarty-3.1.16/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/home/ricblt/workspace/nfq/smarty/templates');
$smarty->setCompileDir('/home/ricblt/workspace/nfq/smarty/templates_c');
$smarty->setCacheDir('/home/ricblt/workspace/nfq/smarty/cache');
$smarty->setConfigDir('/home/ricblt/workspace/nfq/smarty/configs');

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');

