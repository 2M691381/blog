<?php

namespace blog\Controller;

use blog\Model\PostsAdmin;
use blog\Model\CommentAdmin;
use blog\lib\View;

class ControllerPosts 
{

  private $post;
  private $comment;
  
  public function __construct() {
      $this->post = new PostsAdmin();
      $this->comment = new CommentAdmin();
  }

  // Affiche les détails sur un billet
  public function post() 
  {
      $post = $this->post->getPost();
      $vue = new View("Post");
      $vue->generer(array('post' => $post));
  }

  public function posts($postsId)
  {
      $posts = $this->post->getPosts($postsId);
      $comments = $this->comment->getComment($postsId);
      $vue = new View("Posts");
      $vue->generer(array('posts' => $posts, 'comments' => $comments));
  }

  public function comments($postsId, $author, $comment)
  {   if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
      if ($_SESSION['token'] == $_POST['token']) {
      // Sauvegarde du commentaire
      $this->comment->addComments($postsId, $author, $comment);
      // Actualisation de l'affichage de l'posts
      $this->posts($postsId);
  }
  } else {
  $vue = new View("ErrorCom");
  $vue->generer(array());

  header('Refresh: 15; index.php?action=addUser');

    }
  }

  public function newPosts($title, $chapo, $content)
  {   
    if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
      if ($_SESSION['token'] == $_POST['token']) {
          $this->post->addPosts($title, $chapo, $content);
          //Actualisation de l'affichage des post
          $this->post();
      }
    } else {
          throw new \Exception("Erreur de vérification");
    }
  }

  public function editPosts($title, $chapo, $content, $postsId)
  {   
    if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
      if ($_SESSION['token'] == $_POST['token']) {
          $this->post->updatePosts($title, $chapo, $content, $postsId);
          $this->posts($postsId);
      }
    } else {
          throw new \Exception("Erreur de vérification");
    }
  }

  public function dataPosts($postsId) 
  {
      $posts = $this->post->getPosts($postsId);
      return $posts;
  }

  public function deletePosts($postsId)
  {
      $this->post->removePosts($postsId);
      $this->post();
  }


}
