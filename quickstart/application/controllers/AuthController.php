<?php

class AuthController extends Zend_Controller_Action
{

    public function loginAction()
    {
        $form = new Application_Form_Auth_Login();

        $form->setAction($this->view->url());

        $request = $this->getRequest();

        if ($request->isPost()) {
            
            if ($form->isValid($request->getPost())) {

                if ($this->_verifyLogin($form->getValues())) {
                    $this->_helper->FlashMessenger('Successful Login');
                    $this->_helper->redirector('index', 'index');
                }
            }
        }

        $this->view->form = $form;
    }

    /**
     * @param array $values
     *
     * @return bool
     */
    protected function _verifyLogin($values)
    {
        $adapter = $this->_getAuthAdapter();

        $adapter->setIdentity($values['username']);
        $adapter->setCredential($values['password']);

        $auth   = Zend_Auth::getInstance();
        $result = $auth->authenticate($adapter);

        if ($result->isValid()) {
            $user = $adapter->getResultRowObject();
            $auth->getStorage()->write($user);
            return true;
        }

        return false;
    }

}
