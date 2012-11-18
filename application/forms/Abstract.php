<?php
abstract class Application_Form_Abstract extends Zend_Form
{
    /**
     * PriceSpin_Form Constructor
     *
     * @see     PriceSpin_Form::loadDefaultDecorators()
     * @return  void
     */
    public function __construct($options = null)
    {
        $this->addElementPrefixPath(
            'Application_Validate',
            APPLICATION_PATH . DS . 'forms' . DS . 'Validate',
            Zend_Form_Element::VALIDATE
        );
        $this->addElementPrefixPath(
            'Application_Filter',
            APPLICATION_PATH . DS . 'forms' . DS . 'Filter',
            Zend_Form_Element::FILTER
        );
        $this->addPrefixPath(
            'Application_Form_Element_',
            APPLICATION_PATH . DS . 'forms' . DS . 'Element',
            Zend_Form::ELEMENT
        );

        parent::__construct($options);

        $this->setAttrib('accept-charset', 'UTF-8');
        $this->setEnctype(self::ENCTYPE_MULTIPART);
    }
    /**
     * Validate the form
     *
     * @param  array $data
     * @return boolean
     */
    public function isValid($data)
    {
        $valid = parent::isValid($data);

        foreach ($this->getElements() as $element) {
            if ($element->hasErrors()) {
                $oldClass = $element->getAttrib('class');
                if (!empty($oldClass)) {
                    $element->setAttrib('class', $oldClass . ' error');
                } else {
                    $element->setAttrib('class', 'error');
                }
            }
        }

        return $valid;
    }
}