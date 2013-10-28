<?php

class Base_Model_Mapper_Base
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;

        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable($this->_getModelClassName());
        }

        return $this->_dbTable;
    }

    public function fetchAll()
    {
        return $this->getDbTable()->fetchAll();
    }

    /**
     * @return string
     */
    protected function _getModelClassName()
    {
        $separator = '_';
        $modelClassName = 'Application_Model_DbTable';

        $mapperClassName = get_class($this);
        $lastSeparatorPosition = strrpos($mapperClassName, $separator);
        $suffix = substr($mapperClassName, $lastSeparatorPosition);

        return $modelClassName . $suffix;
    }

}