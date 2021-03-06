<?php

class Application_Model_Users
{
    /**
     * @var int
     */
    protected $_id;

    /**
     * @var string
     */
    protected $_username;

    /**
     * @var string
     */
    protected $_password;

    /**
     * @var string
     */
    protected $_salt;

    /**
     * @var string
     */
    protected $_role;

    /**
     * @var string
     */
    protected $_created;

    /**
     * @var string
     */
    protected $_name;

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

    public function setUsername($username)
    {
        $this->_username = $username;

        return $this;
    }

    public function getUsername()
    {
        return $this->_username;
    }

    public function setPassword($password)
    {
        $this->_password = $password;

        return $this;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function getSalt()
    {
        return $this->_salt;
    }

    public function setSalt($salt)
    {
        $this->_salt = $salt;

        return $this;
    }

    public function setRole($role)
    {
        $this->_role = $role;

        return $this;
    }

    public function getRole()
    {
        return $this->_role;
    }

    public function setCreated($dateTime)
    {
        $this->_created = $dateTime;

        return $this;
    }

    public function getCreated()
    {
        return $this->_created;
    }

    public function setName($name)
    {
        $this->_name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->_name;
    }
}	