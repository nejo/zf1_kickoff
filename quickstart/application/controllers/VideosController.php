<?php

class VideosController extends Base_Controller_BaseController
{

    public function indexAction()
    {
        $this->_setupUserFilter();

        $videosMapper = new Application_Model_Mapper_Videos();
        $this->view->videos = $videosMapper->fetchAll();
    }

    protected function _setupUserFilter()
    {
        $this->view->headScript()->appendFile('/js/videos/filter.user.js');

        $filterForm = new Application_Form_Filter_User();

        $filterForm->setAttrib(
            'data-url',
            $this->view->url(
                array('controller' => 'videos', 'action' => 'filter'),
                'default'
            )
        );

        $usersMapper = new Application_Model_Mapper_Users();
        $usersSelector = $usersMapper->getUsersSelector();
        $filterForm->getElement('userId')->setMultiOptions($usersSelector);

        $this->view->filterForm = $filterForm;
    }

    public function viewAction()
    {
        $videosMapper = new Application_Model_Mapper_Videos();
        $video = new Application_Model_Videos();

        $id = $this->getRequest()->getParam('id');
        $videosMapper->find($id, $video);

        $this->view->video = $video;
    }


}



