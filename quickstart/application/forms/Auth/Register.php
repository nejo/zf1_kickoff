<?php

class Application_Form_Auth_Register extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            'text',
            'username',
            array(
                 'label'    => 'Username:',
                 'required' => true,
                 'filters'  => array('StringTrim'),
            )
        );

        $this->addElement(
            'password',
            'password',
            array(
                 'label'    => 'Password:',
                 'required' => true,
            )
        );

        $this->addElement(
            'password',
            'confirm_password',
            array(
                 'label'    => 'Confirm Password:',
                 'required' => true,
                 'validators' => array(
                     array('identical', false, array('token' => 'password'))
                 )
            )
        );

        $this->addElement(
            'text',
            'role',
            array(
                 'label'    => 'Role:',
                 'required' => true,
                 'filters'  => array('StringTrim'),
            )
        );

        $this->addElement(
            'text',
            'name',
            array(
                 'label'    => 'Name:',
                 'required' => true,
                 'filters'  => array('StringTrim'),
            )
        );

        $this->addElement(
            'submit',
            'submit',
            array(
                 'ignore' => true,
                 'label'  => 'Sign In',
            )
        );

    }
}