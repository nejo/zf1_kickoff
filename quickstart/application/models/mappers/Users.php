<?php

class Application_Model_Mapper_Users extends Application_Model_Mapper_Base
{

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