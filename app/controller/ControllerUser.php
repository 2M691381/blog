<?php

namespace blog\Controller;

use blog\Model\UserAdmin;
use blog\Model\CommentAdmin;
use blog\lib\View;

class ControllerUser 
{

	private $user;

	public function __construct() 
	{
		$this->user = new UserAdmin(); 
		$this->comment = new CommentAdmin(); 
		
	}

	public function addUser($user, $pass, $email) 
	{   
	  if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
	  	if ($_SESSION['token'] == $_POST['token']) {
			$pass = hash('sha256', $pass);
	        if($this->user->existUser($user)) {
				$this->user->registrationUser($user, $pass, $email);
				$view = new View("Congrat");
				$view->generer(array());
				return;
		    } 
		    	throw new \Exception("L'utilisateur '$user' existe deja");
		}
	  } else {
	  		throw new \Exception("Erreur de vérification");
	  }
	}

	public function userConnect($user, $pass, $email) 
	{   
	   if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
	  	 if ($_SESSION['token'] == $_POST['token']) {
			$pass = hash('sha256', $pass);
			$connectUserAdmin = $this->user->connectUserAdmin($user, $pass);  
			if($connectUserAdmin != false) {

				$_SESSION['id'] = $connectUserAdmin->getId();
				$_SESSION['admin'] = $connectUserAdmin->getValidate();
				$view = new View("Home"); 
			    $view->generer(array());  
			} else{
					throw new \Exception("Mauvais identifiant ou mot de passe");
			  }
	     }
	   } else {
	   	  	throw new \Exception("Erreur de vérification");
	   }	  
	}

	public function userDisconnect() 
	{
		 $_SESSION = array();
		 session_destroy();
		 $view = new View("Home"); 
		 $view->generer(array());  
	}

	public function users() 
    {  
	      $users = $this->user->getUsers();
	      $commentsValidate = $this->comment->getCommentsValidate();
	      $vue = new View("Admin");
	      $vue->generer(array('users' => $users, 'commentsValidate' => $commentsValidate));
	}

    public function validateUserAdmin($userId)
    {   
    	$users = $this->user->getUsers();
    	$commentsValidate = $this->comment->getCommentsValidate();
    	$validateUser = $this->user->validateUser($userId);
    	$vue = new View("Admin");
        $vue->generer(array('users' => $users, 'commentsValidate' => $commentsValidate));
    }

    public function noValidateUserAdmin($userId)
    {   
    	$users = $this->user->getUsers();
    	$commentsValidate = $this->comment->getCommentsValidate();
    	$validateUser = $this->user->noValidateUser($userId);
    	$vue = new View("Admin");
        $vue->generer(array('users' => $users, 'commentsValidate' => $commentsValidate));
    }

    public function validComment($commentId)
    {   
    	$commentsValidate = $this->comment->getCommentsValidate();
    	$users = $this->user->getUsers();
    	$validComment = $this->comment->validateComment($commentId);
    	$vue = new View("Admin");
        $vue->generer(array('users' => $users, 'commentsValidate' => $commentsValidate));
    }

    public function noValidComment($commentId)
    {   
    	$commentsValidate = $this->comment->getCommentsValidate();
    	$users = $this->user->getUsers();
    	$noValidComment = $this->comment->noValidateComment($commentId);
    	$vue = new View("Admin");
        $vue->generer(array('users' => $users, 'commentsValidate' => $commentsValidate));
    }
}

