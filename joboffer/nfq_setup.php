<?php

/**
 * Project: NFQ Smarty Application
 * Author: Monte Ohrt
 * File: nfq_setup.php
 * Version: 1.1
 */

require(SMARTY_DIR . 'Smarty.class.php');

// smarty configuration
class Nfq_Smarty extends Smarty {
    function __construct() {
        parent::__construct();
        $this->setTemplateDir(NFQ_DIR . 'joboffer/View');
        $this->setCompileDir(NFQ_DIR . 'templates_c');
        $this->setConfigDir(NFQ_DIR . 'configs');
        $this->setCacheDir(NFQ_DIR . 'cache');
    }
}