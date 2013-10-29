<?php

class Application_Model_UsersMapper
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
            $this->setDbTable('Application_Model_DbTable_Users');
        }

        return $this->_dbTable;
    }

    public function save(Application_Model_Users $user)
    {
        $data = array(
            'username'   => $user->getUsername(),
            'password' => $user->getPassword(),
            'salt' => $user->getSalt(),
            'created' => date('Y-m-d H:i:s'),
            'role' => $user->getRole(),
            'name' => $user->getName(),
        );

        if (null === ($id = $user->getId())) {
            unset($data['id']);
            $result = $this->getDbTable()->insert($data);
        } else {
            $result = $this->getDbTable()->update($data, array('id = ?' => $id));
        }

        return (boolean) $result;
    }

    public function find($id, Application_Model_Users $user)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $user->setId($row->id)
        ->setUsername($row->username)
        ->setCreated($row->created);
    }

    public function fetchAll()
    {
        return $this->getDbTable()->fetchAll();
    }

    /**
     * @return array
     */
    public function getUsersSelector()
    {
        $usersList = $this->fetchAll();
        $usersSelector[0] = "Please choose";

        foreach ($usersList as $value) {
            $usersSelector[$value->id] = $value->username;
        }

        return $usersSelector;
    }
}