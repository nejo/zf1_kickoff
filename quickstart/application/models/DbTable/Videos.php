<?php

class Application_Model_DbTable_Videos extends Zend_Db_Table_Abstract
{

    protected $_name = 'videos';

    protected $_rowClass = 'Application_Model_Row_Video';

    protected $_referenceMap = array(
        'User' => array(
            'columns'       => 'user_id',
            'refTableClass' => 'Application_Model_DbTable_Users',
            'refColumns'    => 'id'
        )
    );
}

