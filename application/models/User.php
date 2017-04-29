<?php

class Application_Model_User {
    protected $_id;
    
	protected $_name;
	protected $_nickname;
	protected $_birthdate;
	
	protected $_email;
	
	protected $_passwordencrypt; //FF Password è in chiaro???????? se si bisogna criptarla e poi decriptarla
	protected $_passwordsalt; //FF Serve per decriptare una password
    
    protected $_points;	
    protected $_captchacount;

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
            throw new Exception('Invalid user property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
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

	public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

	public function getName()
	{
		return $this->_name;
	}

	public function setNickname($nickname)
    {
        $this->_nickname = (string) $nickname;
        return $this;
    }

	public function getNickname()
	{
		return $this->_nickname;
	}

	public function setBirthdate($birthdate)
    {
        $this->_birthdate = $birthdate;
        return $this;
    }

	public function getBirthdate()
	{
		return $this->_birthdate;
	}

	public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }

	public function getEmail()
	{
		return $this->_email;
	}

	public function setPasswordencrypt($passwordencrypt)
    {
        $this->_passwordencrypt = (string) $passwordencrypt;
        return $this;
    }

	public function getPasswordencrypt()
	{
		return $this->_passwordencrypt;
	}

	public function setPasswordsalt($passwordsalt)
    {
        $this->_passwordsalt = (string) $passwordsalt;
        return $this;
    }

	public function getPasswordsalt()
	{
		return $this->_passwordsalt;
	}

	public function setPoints($points)
    {
        $this->_points = (int) $points;
        return $this;
    }

	public function getPoints()
	{
		return $this->_points;
	}

	public function setCaptchacount($captchacount)
    {
        $this->_captchacount = (int) $captchacount;
        return $this;
    }

	public function getCaptchacount()
	{
		return $this->_captchacount;
	}

}

?>
