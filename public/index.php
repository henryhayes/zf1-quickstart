<?php
require_once(dirname(dirname(realpath(__FILE__))) . DIRECTORY_SEPARATOR . 'application.php');

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
$application->bootstrap()->run();
