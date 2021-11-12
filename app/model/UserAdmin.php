<?php

namespace blog\Model;

use blog\lib\Model;
use blog\Model\User;

class UserAdmin extends Model
{

// enregistrement utilisateur en bdd avant modération int = 0
	public function registrationUser($login, $email, $password)
	{
		$sql = 'INSERT INTO users (login, email, password, confirm) VALUES (?, ?, ?, 0)';
		$this->executerRequete($sql, array($login, $email, $password));
	}

// on vérifie juste l'email pour voir si utilisateur déjà en bdd
	public function existUser($email)
	{
		$sql = 'SELECT * FROM users WHERE email = ?';
		$user = $this->executerRequete($sql, array($email));
		return ($user->rowCount() === 0);
	}

// autorise connexion des utilisateurs validé int > 0 y compris admin en int 1
	public function connectUserAdmin($login, $email, $password)
	{
		$sql = 'SELECT * FROM users WHERE login = ? AND email = ? AND password = ? AND confirm > 0';
		$userExist = $this->executerRequete($sql, array($login, $email, $password));
		if ($userExist->rowCount() == 1) {
			return $userExist->fetchObject(User::class);
		}
		return false;
	}

// affiche liste utilisateur à valider
	public function getUsers() 
    {
	      $users = [];
	      $sql = 'SELECT * FROM users  WHERE confirm = 0 ORDER BY users_id DESC';
	      $request = $this->executerRequete($sql);
	      return $request->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    public function getUser($users_id)
    {
    	$sql = 'SELECT * FROM users WHERE users_id = ?';
    	$request = $this->executerRequete($sql,array($users_id));
    	return $request->fetchObject(User::class);
    }

// valide l'utilisateur avec int 2 ou suppression de la bdd
    public function confirmUser($users_id)
    {
    	$sql = 'UPDATE users SET confirm = 2 WHERE users_id = ?';
    	$this->executerRequete($sql, array($users_id));
    }

    public function noConfirmUser($users_id)
    {
    	$sql = 'DELETE FROM users WHERE users_id = ?';
    	$this->executerRequete($sql, array($users_id));
    }
}