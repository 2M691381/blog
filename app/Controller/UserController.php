<?php

namespace blog\Controller;

use blog\Model\UserAdmin;
use blog\Model\CommentAdmin;
use blog\lib\View;

class UserController
{

	private $user;

	public function __construct() 
	{
		$this->user = new UserAdmin();
		$this->comment = new CommentAdmin();
		
	}

	public function addUser($login, $email, $password)
	{   
	  if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
	  	if ($_SESSION['token'] == $_POST['token']) {
			$password = hash('sha256', $password);
	        if($this->user->existUser($email)) {
				$this->user->registrationUser($login, $email, $password);
				$view = new View("Great");
				$view->generer(array());
				return;
		    } 
		    	throw new \Exception("L'utilisateur '$email' existe deja");
		}
	  } else {
	  		throw new \Exception("Erreur de vérification");
	  }
	}

	public function userAuth($login, $email, $password)
	{   
	   if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
	  	 if ($_SESSION['token'] == $_POST['token']) {
			$password = hash('sha256', $password);
			$connectUserAdmin = $this->user->connectUserAdmin($login, $email, $password);
			if($connectUserAdmin != false) {

				$_SESSION['id'] = $connectUserAdmin->getUsers_id();
				$_SESSION['admin'] = $connectUserAdmin->getConfirm();
				$view = new View("Home"); 
			    $view->generer(array());  
			} else{
					throw new \Exception("Mauvais identifiant ou mot de passe ou compte non-validé");
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

// Affiche liste users à modérer
	public function users() 
    {  
	      $users = $this->user->getUsers();
	      $commentsApprouve = $this->comment->getCommentsApprouve();
	      $vue = new View("Admin");
	      $vue->generer(array('users' => $users, 'commentsApprouve' => $commentsApprouve));
	}

// user validé mais pas de popup de confirmation, juste un rafraichissemnt de la page !!
        public function confirmUser($users_id)
    {
    	$users = $this->user->getUsers();
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$confirmUser = $this->user->confirmUser($users_id);
        header('Refresh: 0.2; index.php?action=admin');
        ?>
        <script>alert("L'utilisateur a bien été validé !")</script>
        <?php
    }

//page dashboard admin sans confirmation pop up de validation de suppression user, ne marche pas !
    public function noConfirmUser($users_id)
    {
    	$users = $this->user->getUsers();
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$confirmUser = $this->user->noConfirmUser($users_id);
        ?>
        <script>alert("L'utilisateur a bien été supprimé !")</script>
        <?php
        header('Refresh: 0.2; index.php?action=admin');
     }

// user redirigé vers page de confirmation de suppression d'users
    public function noConfirmUser1($users_id)
    {
    	$users = $this->user->getUsers();
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$confirmUser = $this->user->getUsers();
    	$vue = new View("DeleteUser");
        $vue->generer(array('users' => $users, 'commentsApprouve' => $commentsApprouve));
    }


// commentaires moderation - 3 suivants idem aux users, sauf que la pop up de confirmation fonctionne bien !
    public function validComment($comments_id)
    {   
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$users = $this->user->getUsers();
    	$validComment = $this->comment->approuveComment($comments_id);
        header('Refresh: 0.2; index.php?action=admin');
        echo "<script>alert('Votre commentaire a bien été validé !')</script>";
    }

    public function noValidComment($comments_id)
    {   
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$users = $this->user->getUsers();
     	$validComment = $this->comment->noApprouveComment($comments_id);
        echo "<script>alert('Votre commentaire a bien été supprimé !')</script>";
        header('Refresh: 0.2; index.php?action=admin');
    }

        public function noValidComment1($comments_id)
    {
    	$commentsApprouve = $this->comment->getCommentsApprouve();
    	$users = $this->user->getUsers();
    	$validComment = $this->comment->getCommentsApprouve();
    	$vue = new View("DeleteCom");
        $vue->generer(array('users' => $users, 'commentApprouve' => $commentApprouve));
    }
}

