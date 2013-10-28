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

            $result = '<li>Welcome ' . $username . '.</li>
            <li><a href="' . $logoutUrl . '">Logout</a></li>';
        } else {
            $loginUrl = $this->view->url(
                array('controller' => 'auth', 'action' => 'login')
            );
            $result = '<li><a href="' . $loginUrl . '">' . $this->view->translate('Login') . '</a></li>';
        }

        return $result;
    }
}