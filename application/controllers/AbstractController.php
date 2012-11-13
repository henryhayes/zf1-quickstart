<?php

/**
 * @see AbstractController
 */
require_once('Zend/Controller/Action.php');

abstract class AbstractController extends Zend_Controller_Action
{
    /**
     * Retrieves the log object.
     *
     * @return Zend_Log
     */
    public function getLog()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->hasPluginResource('Log')) {
            return false;
        }
        $log = $bootstrap->getResource('Log');

        return $log;
    }
}