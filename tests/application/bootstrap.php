<?php
require_once(dirname(dirname(dirname(realpath(__FILE__)))) . DIRECTORY_SEPARATOR . 'application.php');

require_once 'Zend/Application.php';

$application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
$application->bootstrap();
