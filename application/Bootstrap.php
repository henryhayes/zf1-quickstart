<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Application resource namespace
     *
     * @var string
     */
    protected $_appNamespace = 'Application';

    /**
     * Setup the view (presentation) tier's default document type. This does
     * more that just setup the doctype. It also tells the view how to render
     * certain HTML entities. Very important.
     */
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
                    'path'      => 'models' . DIRECTORY_SEPARATOR . 'colections',
                ),
                'adapters' => array(
                    'namespace' => 'Adapter',
                    'path'      => 'adapters',
                ),
                'view' => array(
                    'namespace' => 'View',
                    'path'      => 'view',
                ),
                'frontcontroller' => array(
                    'namespace' => 'FrontController',
                    'path'      => 'frontcontroller',
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
     * Initialise Session
     */
    protected function _initSession()
    {
        Zend_Session::setOptions(
            array(
                'strict'        => false,
                'name'          => strtolower($this->_appNamespace) . '_myapplication',
                'cookie_secure' => false,
                'save_path'     => SESSION_PATH,
            )
        );

        Zend_Session::start();
    }

    /**
     * Registers action helpers.
     *
     * @return void
     */
    public function _initHelpers()
    {
        Zend_Controller_Action_HelperBroker::addPath(
            APPLICATION_PATH . DIRECTORY_SEPARATOR . 'helpers', 'WlpApi_Helper'
        );
    }
}

