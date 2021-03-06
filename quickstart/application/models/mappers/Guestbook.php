<?php

class Application_Model_Mapper_Guestbook extends Application_Model_Mapper_Base
{

    public function save(Application_Model_Guestbook $guestbook)
    {
        $data = array(
            'user_id'   => $guestbook->getUserId(),
            'comment' => $guestbook->getComment(),
            'created' => date('Y-m-d H:i:s'),
        );

        if (null === ($id = $guestbook->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_Guestbook $guestbook)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $guestbook->setId($row->id)
                  ->setUser($row->getUser())
                  ->setComment($row->comment)
                  ->setCreated($row->created);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Guestbook();
            $entry->setId($row->id)
                ->setUser($row->getUser())
                ->setComment($row->comment)
                ->setCreated($row->created);
            $entries[] = $entry;
        }
        return $entries;
    }
}