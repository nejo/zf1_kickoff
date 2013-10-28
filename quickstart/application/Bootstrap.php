<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initRoutes()
    {
        $this->bootstrap('FrontController');

        $router = $this->getResource('FrontController')->getRouter();

        $myRoutes = new Zend_Config_Ini(
            APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'routes.ini',
            APPLICATION_ENV
        );

        $router->addConfig($myRoutes, 'routes');
    }

	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('HTML5');
	}

	protected function _initHeadtitle()
	{
		$view = $this->getResource('view');
		$view->headTitle('Zend Framework 1 Quickstart Application');
		$view->headTitle()->setSeparator(' | ');
	}

	protected function _initMeta()
	{
		$view = $this->getResource('view');
		$view->headMeta()->setHttpEquiv('Content-Type', 'text/html; charset=utf-8');
	}

    protected function _initStylesheets()
    {
        $view = $this->getResource('view');
        $view->headLink()->appendStylesheet('/css/bootstrap.min.css');
        $view->headLink()->appendStylesheet('/css/bootstrap-responsive.min.css');
        $view->headLink()->appendStylesheet('/css/layout.css');
    }

    protected function _initJavascripts()
    {
        $view = $this->getResource('view');
        $view->headScript()->appendFile('/js/bootstrap.min.js');
    }
}

