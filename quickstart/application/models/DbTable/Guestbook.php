<?php

class Application_Model_DbTable_Guestbook extends Zend_Db_Table_Abstract
{

    protected $_name = 'guestbook';

    protected $_referenceMap = array(
        'Users' => array(
            'columns' => 'user_id',
            'refTableClass' => 'Application_Model_DbTable_Users',
            'refColumns' => 'id'
        )
    );

}

