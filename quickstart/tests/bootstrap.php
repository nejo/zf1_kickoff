<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

/** Vendor Autoload */
require_once realpath(APPLICATION_PATH . '/../../vendor/autoload.php');

Zend_Loader_Autoloader::getInstance();
