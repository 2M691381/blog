<?php

namespace blog\Controller;

use blog\Model\PostAdmin;
use blog\Model\CommentAdmin;
use blog\lib\View;
use blog\Controller\UserController;

class PostController
{

  private $posts;
  private $comment;
  
  public function __construct() {
      $this->posts = new PostAdmin();
      $this->comment = new CommentAdmin();

  }

  // Affiche les détails d'un article
  public function posts()
  {
      $posts = $this->posts->getPosts();
      $vue = new View("Posts");
      $vue->generer(array('posts' => $posts));
  }

// affiche detail page article + commentaire
  public function post($posts_id)
  {
      $post = $this->posts->getPost($posts_id);
      $comments = $this->comment->getComments($posts_id);
      $vue = new View("Post");
      $vue->generer(array('post' => $post, 'comments' => $comments));
  }

// ajout de commentaire avec autorisation user qui ne fonctionne pas, user_id / login . si pas inscrit, redirection .
  public function comment($comment, $posts_id, $users_id)
  {
   if ($_SESSION['id'] > 0) {
      // Sauvegarde du commentaire
      $this->comment->addComment($comment, $posts_id, $users_id);
      // Actualisation de l'affichage de l'article
      $this->post($posts_id);
     
        } else {
            $vue = new View("ErrorCom");
            $vue->generer(array());

            header('Refresh: 5; index.php?action=addUser');
        }
  }

  public function newPost($title, $chapo, $content, $users_id)
  {   
    if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
      if ($_SESSION['token'] == $_POST['token']) {
          $this->posts->addPost($title, $chapo, $content, $users_id);
          //Actualisation de l'affichage des articles
          $this->posts();
      }
    } else {
          throw new \Exception("Erreur de vérification");
    }
  }

// user_id et login imossible de les associer
  public function editPost($title, $chapo, $content, $users_id, $posts_id)
  {   
    if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
      if ($_SESSION['token'] == $_POST['token']) {
          $this->posts->updatePost($title, $chapo, $content, $users_id, $posts_id);
          $this->post($posts_id);
      }
    } else {
          throw new \Exception("Erreur de vérification");
    }
  }

  public function dataPost($posts_id)
  {
      $post = $this->posts->getPost($posts_id);
      return $post;
  }

  public function deletePost($posts_id)
  {
      $this->posts->removePost($posts_id);
      $this->posts();
  }


}
