<?php

class Application_Model_Videos
{
    /**
     * @var int
     */
    protected $_id;

    /**
     * @var string
     */
    protected $_title;

    /**
     * @var string
     */
    protected $_youtubeKey;

    /**
     * @var int
     */
    protected $_userId;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setId($id)
    {
        $this->_id = (int) $id;

        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setTitle($title)
    {
        $this->_title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setYoutubeKey($youtubeKey)
    {
        $this->_youtubeKey = $youtubeKey;

        return $this;
    }

    public function getYoutubeKey()
    {
        return $this->_youtubeKey;
    }

    public function setUserId($userId)
    {
        $this->_userId = (int) $userId;

        return $this;
    }

    public function getUserId()
    {
        return $this->_userId;
    }
}	