<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

    protected $_primary = 'id';

    protected $_sequence = true;

    protected $_dependentTables = array('Guestbook');

}
