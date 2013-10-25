<?php

class AuthController extends Zend_Controller_Action
{

    public function loginAction()
    {
        $db = $this->_getParam('db');

        $form = new Application_Form_Auth_Login();

        $form->setAction($this->view->url());

        $request = $this->getRequest();

        if ($request->isPost()) {
            
            if ($form->isValid($request->getPost())) {

                $adapter = new Zend_Auth_Adapter_DbTable(
                    $db,
                    'users',
                    'username',
                    'password',
                    'MD5(CONCAT(?, password_salt))'
                );

                $adapter->setIdentity($form->getValue('username'));
                $adapter->setCredential($form->getValue('password'));

                $auth   = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);

                if ($result->isValid()) {
                    $this->_helper->FlashMessenger('Successful Login');
                    $this->_redirect('/');
                    return;
                }
            }
        }

        $this->view->loginForm = $form;
    }

}
