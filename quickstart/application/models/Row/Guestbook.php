<?php

class Application_Model_Row_Guestbook extends Zend_Db_Table_Row_Abstract
{
    private $_user = null;

    /**
     * @return Application_Model_Row_User
     */
    public function getUser()
    {
        if (!$this->_user) {
            $this->_user = $this->findParentRow('Application_Model_DbTable_Users');
        }

        return $this->_user;
    }
}