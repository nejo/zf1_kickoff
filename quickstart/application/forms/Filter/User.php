<?php

class Application_Form_Filter_User extends Twitter_Bootstrap_Form_Inline
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            'select',
            'userId',
            array(
                 'label'    => 'User:',
                 'required' => true,
            )
        );

        $this->addElement(
            'submit',
            'submit',
            array(
                 'ignore' => true,
                 'label'  => 'Filter',
            )
        );

    }
}