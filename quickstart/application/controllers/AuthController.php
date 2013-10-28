<?php

class AuthController extends Base_Controller_BaseController
{

    /**
     * Login action
     */
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

    /**
     * @return Zend_Auth_Adapter_DbTable
     */
    protected function _getAuthAdapter()
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $authAdapter->setTableName('users')
            ->setIdentityColumn('username')
            ->setCredentialColumn('password')
            ->setCredentialTreatment('SHA1(CONCAT(?,salt))');

        return $authAdapter;
    }

    /**
     * Logout
     */
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index', 'index');
    }

    public function registerAction()
    {
        $form = new Application_Form_Auth_Register();

        $form->setAction($this->view->url());

        $request = $this->getRequest();

        if ($request->isPost()) {

            if ($form->isValid($request->getPost())) {

                if ($this->_register($form->getValues())) {
                    $this->_helper->FlashMessenger('Successful Registration');
                    $this->_helper->redirector('index', 'index');
                }
            }
        }

        $this->view->form = $form;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected function _register($data)
    {
        $user = new Application_Model_Users($data);
        $mapper  = new Application_Model_UsersMapper();
        return $mapper->save($user);
    }


}


