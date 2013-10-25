<?php

class Zend_View_Helper_LoggedInAs extends Zend_View_Helper_Abstract
{
    public function loggedInAs()
    {
        $result = '';

        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $username  = $auth->getIdentity()->username;
            $logoutUrl = $this->view->url(
                array(
                     'controller' => 'auth',
                     'action'     => 'logout'
                ),
                null,
                true
            );

            $result = 'Welcome ' . $username . '. <a href="' . $logoutUrl . '">Logout</a>';
        } else {
            $loginUrl = $this->view->url(
                array('controller' => 'auth', 'action' => 'login')
            );
            $result = '<a href="' . $loginUrl . '">Login</a>';
        }

        return $result;
    }
}