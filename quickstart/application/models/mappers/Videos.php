<?php

class Application_Model_Mapper_Videos extends Application_Model_Mapper_Base
{

    public function save(Application_Model_Videos $videos)
    {
        $data = array(
            'username'   => $videos->getUsername(),
            'password' => $videos->getPassword(),
            'salt' => $videos->getSalt(),
            'created' => date('Y-m-d H:i:s'),
            'role' => $videos->getRole(),
            'name' => $videos->getName(),
        );

        if (null === ($id = $videos->getId())) {
            unset($data['id']);
            $result = $this->getDbTable()->insert($data);
        } else {
            $result = $this->getDbTable()->update($data, array('id = ?' => $id));
        }

        return (boolean) $result;
    }

    public function find($id, Application_Model_Videos $video)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $video->setId($row->id)
            ->setTitle($row->title)
            ->setYoutubeKey($row->youtube_key)
            ->setUserId($row->user_id);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Videos();
            $entry->setId($row->id)
                ->setTitle($row->title)
                ->setYoutubeKey($row->youtube_key)
                ->setUserId($row->user_id);
            $entries[] = $entry;
        }
        return $entries;
    }
}