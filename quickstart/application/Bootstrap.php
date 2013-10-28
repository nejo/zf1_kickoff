<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initRoutes()
    {
        $this->bootstrap('FrontController');

        $router = $this->getResource('FrontController')->getRouter();

        $cacheManager = $this->bootstrap('cachemanager')->getResource('cachemanager');
        $cache = $cacheManager->getCache('cache');
        $cacheId = 'routes';

        $myRoutes = $cache->load($cacheId);

        if (!$myRoutes) {
            $myRoutes = new Zend_Config_Ini(
                APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'routes.ini',
                APPLICATION_ENV
            );
            $cache->save($myRoutes, $cacheId);
        }

        $router->addConfig($myRoutes, 'routes');
    }
}

