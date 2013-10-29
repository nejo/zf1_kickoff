<?php

class Application_Model_DbTable_Videos extends Zend_Db_Table_Abstract
{

    protected $_name = 'videos';

    protected $_referenceMap = array(
        'User' => array(
            'columns'       => 'user_id',                           // the column in the 'videos' table which is used for the join
            'refTableClass' => 'Application_Model_DbTable_Users',   // the users classname for users table
            'refColumns'    => 'id'                                 // the primary key of the users table
        )
    );
}

