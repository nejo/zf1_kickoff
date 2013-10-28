<?php

class Application_Plugin_Language
    extends Zend_Controller_Plugin_Abstract
{
    /**
     * @todo check requested to the saved in preferences
     * @link http://framework.zend.com/manual/1.12/en/zend.locale.functions.html
     *
     * @param Zend_Controller_Request_Abstract $request
     */
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        $lang = $request->getParam('lang', null);

        if (!empty($lang)) {
            $translate = Zend_Registry::get('Zend_Translate');

            $locale = new Zend_Locale($lang);

            if ($translate->isAvailable($locale)) {
                $translate->setLocale($locale);
            }

            // Set language to global param so that our language route can
            // fetch it nicely.
            $front = Zend_Controller_Front::getInstance();
            $router = $front->getRouter();
            $router->setGlobalParam('lang', $lang);
        }

    }
}