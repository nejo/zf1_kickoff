<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initCache()
    {
        /**
         * http://framework.zend.com/manual/1.12/en/zend.cache.theory.html
         * http://framework.zend.com/manual/1.12/en/zend.application.available-resources.html
         * http://www.zfsnippets.com/snippets/view/id/72/bootstrap-cache-resource
         *
         * for routes
         * http://stackoverflow.com/questions/6842639/zend-config-ini-caching
         */
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
    }

    protected function _initJavascripts()
    {
        $view = $this->getResource('view');
        $view->headScript()->appendFile('/js/bootstrap.min.js');
    }
}

