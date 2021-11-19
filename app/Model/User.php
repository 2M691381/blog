<?php 

namespace blog\Model;

class User
{
	private $users_id;
	private $login;
    private $email;
	private $password;
    private $confirm;

    public function getUsers_id()
    {
    	return $this->users_id;
    }

    public function setUsers_id($users_id)
    {
    	$this->users_id = $users_id;
    }

    public function getLogin()
    {
    	return $this->login; 
    }

    public function setLogin($login)
    {
    	$this->login = $login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
    	return $this->password; 
    }

    public function setPassword($password)
    {
    	$this->password = $password;
    }

    public function getConfirm()
    {
        return $this->confirm; 
    }

    public function setConfirm($confirm)
    {
        $this->confirm = $confirm;
    }

}    