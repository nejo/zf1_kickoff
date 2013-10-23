<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
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
}

