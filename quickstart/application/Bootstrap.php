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

    protected function _initTranslate()
    {
        $translate = new Zend_Translate(
            'gettext',
            APPLICATION_PATH . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'languages',
            null,
            array(
                'disableNotices' => true,
                'scan'           => Zend_Translate::LOCALE_DIRECTORY
            )
        );

        $registry = Zend_Registry::getInstance();
        $registry->set('Zend_Translate', $translate);

        $translate->setLocale('en');
    }

    public function _initRoutes()
    {
        $this->bootstrap('FrontController');

        $router = $this->getResource('FrontController')->getRouter();

        $langRoute = new Zend_Controller_Router_Route(
            ':lang/',
            array(
                 'lang' => 'en',
            )
        );

        $defaultRoute = new Zend_Controller_Router_Route(
            ':controller/:action',
            array(
                 'module'     => 'default',
                 'controller' => 'index',
                 'action'     => 'index'
            )
        );

        $defaultRoute = $langRoute->chain($defaultRoute);

        $router->addRoute('langRoute', $langRoute);
        $router->addRoute('defaultRoute', $defaultRoute);
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

