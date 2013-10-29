<?php

class Base_Controller_BaseController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_initDoctype();
        $this->_initHeadtitle();
        $this->_initMeta();
        $this->_initStylesheets();
        $this->_initJavascripts();

        $this->view->messages = $this->_helper->flashMessenger->getMessages();
    }

    protected function _initDoctype()
    {
        $this->view->doctype('HTML5');
    }

    protected function _initHeadtitle()
    {
        $this->view->headTitle('Zend Framework 1 Quickstart Application');
        $this->view->headTitle()->setSeparator(' | ');
    }

    protected function _initMeta()
    {
        $this->view->headMeta()->setHttpEquiv('Content-Type', 'text/html; charset=utf-8');
    }

    protected function _initStylesheets()
    {
        $this->view->headLink()->appendStylesheet('/css/bootstrap.min.css');
        $this->view->headLink()->appendStylesheet('/css/bootstrap-responsive.min.css');
        $this->view->headLink()->appendStylesheet('/css/layout.css');
    }

    protected function _initJavascripts()
    {
        $this->view->headScript()->appendFile('/js/jquery-2.0.3.min.js');
        $this->view->headScript()->appendFile('/js/bootstrap.min.js');
    }

}



