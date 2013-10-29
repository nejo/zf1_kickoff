<?php

class VideosController extends Base_Controller_BaseController
{

    public function indexAction()
    {
        $this->_setupUserFilter();


    }

    protected function _setupUserFilter()
    {
        $filterForm = new Application_Form_Filter_User();

        $usersMapper = new Application_Model_Mapper_Users();
        $usersSelector = $usersMapper->getUsersSelector();
        $filterForm->getElement('userId')->setMultiOptions($usersSelector);

        $this->view->filterForm = $filterForm;
    }


}

