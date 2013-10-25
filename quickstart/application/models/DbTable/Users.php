<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

    protected $_rowClass = 'Application_Model_Row_User';

    protected $_dependentTables = array('Model_DbTable_Guestbook');

}
