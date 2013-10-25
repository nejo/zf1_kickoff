<?php

class GuestbookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $guestbook = new Application_Model_GuestbookMapper();
        $this->view->entries = $guestbook->fetchAll();
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Guestbook();

        $form->getElement('user_id')->setMultiOptions($this->_getUserSelector());
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_Guestbook($form->getValues());
                $mapper  = new Application_Model_GuestbookMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }

    protected function _getUserSelector()
    {
        // List of Counties does not exist in Cache, read from DB
        if (!$usersList = $this->getFromCache('users')) {

            $usersMapper = new Application_Model_UsersMapper();
            $usersDropdown = $usersMapper->createUsersSelector();

            // Save DB Result in Cache
            $this->addToCache('users', $usersDropdown);

            return $usersDropdown;
        } else {
            // Return Country List from Cache
            return $this->getFromCache('users');
        }
    }

}



