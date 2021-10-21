<?php

namespace blog\Model;

use blog\lib\Model;
use blog\Model\User;

class UserAdmin extends Model 
{

	public function registrationUser($user, $pass, $email) 
	{
		$sql = 'INSERT INTO members (user, pass, email, validate) VALUES (?, ?, ?, 0)';
		$this->executerRequete($sql, array($user, $pass, $email));
	}

	public function existUser($user) 
	{
		$sql = 'SELECT * FROM members WHERE user = ?';
		$user = $this->executerRequete($sql, array($user));
		return ($user->rowCount() === 0);
	}

	public function connectUserAdmin($user, $pass) 
	{
		$sql = 'SELECT * FROM members WHERE user = ? AND pass = ?';
		$userExist = $this->executerRequete($sql, array($user, $pass));
		if ($userExist->rowCount() == 1) {
			return $userExist->fetchObject(User::class);
		}
		return false;
	}

	public function getUsers() 
    {
	      $users = [];
	      $sql = 'SELECT * FROM members ORDER BY id DESC';
	      $request = $this->executerRequete($sql);
	      return $request->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    public function getUser($userId)
    {
    	$sql = 'SELECT * FROM members WHERE id = ?';
    	$request = $this->executerRequete($sql,array($userId));
    	return $request->fetchObject(User::class);
    }

    public function validateUser($userId)
    {
    	$sql = 'UPDATE user SET validate = 1 WHERE id = ?';
    	$this->executerRequete($sql, array($userId));
    }

    public function noValidateUser($userId)
    {
    	$sql = 'UPDATE user SET validate = 0 WHERE id = ?';
    	$this->executerRequete($sql, array($userId));
    }
}