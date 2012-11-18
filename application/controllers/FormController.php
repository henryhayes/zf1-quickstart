<?php
/**
 * @see AbstractController
 */
require_once(realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'AbstractController.php');

class FormController extends AbstractController
{
    public function multiAction()
    {
        echo 'Milti-form';
    }
}