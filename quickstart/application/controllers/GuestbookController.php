<?php

class GuestbookController extends Base_Controller_BaseController
{

    public function indexAction()
    {
        $guestbook = new Application_Model_Mapper_Guestbook();
        $this->view->entries = $guestbook->fetchAll();
    }

    public function signAction()
    {
        $form = new Application_Form_Guestbook();

        $usersMapper = new Application_Model_Mapper_Users();
        $usersSelector = $usersMapper->getUsersSelector();
        $form->getElement('userId')->setMultiOptions($usersSelector);

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $comment = new Application_Model_Guestbook($form->getValues());
                $mapper  = new Application_Model_Mapper_Guestbook();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }

}



