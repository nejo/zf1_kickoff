<?php

class VideosController extends Base_Controller_BaseController
{

    public function indexAction()
    {
        $this->_list();
    }

    public function filterAction()
    {
        $this->_list();
    }

    protected function _list()
    {
        $where = $this->_getFilterConditions();

        $this->_setupUserFilter($where);

        $videosMapper = new Application_Model_Mapper_Videos();
        $this->view->videos = $videosMapper->fetchAll($where);
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

    /**
     * @return array
     */
    protected function _getFilterConditions()
    {
        $where = array('user_id' => null);

        $userId = $this->getRequest()->getParam('userId', null);

        if (is_numeric($userId)) {
            $where['user_id'] = $userId;
        }

        return $where;
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



