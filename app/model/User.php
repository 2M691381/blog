<?php 

namespace blog\Model;

class User
{
    private $id; 
    private $user;
    private $pass;
    private $email;
    private $date_register;
    private $validate;

    public function getId()
    {
        return $this->id; 
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUser()
    {
        return $this->user; 
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getPass()
    {
        return $this->pass; 
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getEmail()
    {
        return $this->email; 
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getValidate()
    {
        return $this->validate; 
    }

    public function setValidate($validate)
    {
        $this->validate = $validate;
    }

}    