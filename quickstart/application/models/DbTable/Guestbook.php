<?php

class Application_Model_DbTable_Guestbook extends Zend_Db_Table_Abstract
{

    protected $_name = 'guestbook';

    protected $_rowClass = 'Application_Model_Row_Guestbook';   // row class for extending

    protected $_referenceMap = array(
        'User' => array(
            'columns'       => 'user_id',   // the column in the 'guestbook' table which is used for the join
            'refTableClass' => 'users',     // the users table name
            'refColumns'    => 'id'         // the primary key of the users table
        )
    );

}

