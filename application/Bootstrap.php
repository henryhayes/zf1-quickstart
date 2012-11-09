<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Application resource namespace
     *
     * @var string
     */
    protected $_appNamespace = 'Application';

    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML5');
    }

    /**
     * Initialises resource types.
     *
     * @return void
     */
    public function _initResourceTypes()
    {
        $this->getResourceLoader()->addResourceTypes(
            array(
                'mappers' => array(
                    'namespace' => 'Model_Collection',
                    'path'      => 'models/colections',
                ),
                'adapters' => array(
                    'namespace' => 'Adapter',
                    'path'      => 'adapters',
                ),
                'view' => array(
                    'namespace' => 'View',
                    'path'      => 'view',
                ),
                'controller' => array(
                    'namespace' => 'Controller',
                    'path'      => 'controller',
                ),
                'filters' => array(
                    'namespace' => 'Filter',
                    'path'      => 'forms' . DIRECTORY_SEPARATOR . 'Filter',
                ),
                'validators' => array(
                    'namespace' => 'Validator',
                    'path'      => 'forms' . DIRECTORY_SEPARATOR . 'Validate',
                ),
            )
        );
    }

    /**
     * Registers action helpers.
     *
     * @return void
     */
    public function _initHelpers()
    {
        Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH . DS . 'helpers', 'WlpApi_Helper');
    }
}

