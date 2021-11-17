<?php

namespace blog\Controller;

use blog\lib\Request;
use blog\Controller\PostController;
use blog\Controller\UserController;
use blog\lib\View;

class Router 
{

    private $ctrlPost;
    private $ctrlUser;
    private $request;

    public function __construct() 
    {
      $this->request = new Request();
      $this->ctrlPost = new PostController();
      $this->ctrlUser = new UserController();
      
    }

    // Traite une requête entrante
    public function routerRequest() 
    {
      try {  
          if (isset($_GET['action'])) {
              switch ($_GET['action']) {
              //VISUALISATION DES ARTICLES 
              case 'posts':
                    $this->ctrlPost->posts();
                    break;

              //VISUALISATION D'UN ARTICLE ET SES COMMENTAIRES
              case 'post':
                    $posts_id = intval($this->request->getParameter($_GET,'id'));
                    if ($posts_id != 0) {
                      $this->ctrlPost->post($posts_id);
                      return;
                    }
                        throw new \Exception("Identifiant de L'article non valide");
                    break;

            //AJOUTER UN COMMENTAIRE QUI NE FONCTIONNE PAS, USERID ET LOGIN COINCIDE PAS !
              case 'comment':
                  if(!empty($_POST) AND !empty($_GET)) {
                    $comment = $this->request->getParameter($_POST,'comment');
                    $posts_id = $this->request->getParameter($_GET,'id');
                    $users_id = $this->request->getParameter($_GET, 'id2');
                    $this->ctrlPost->comment($comment, $posts_id, $users_id);
                  }
                    break;

                //AJOUTER UN ARTICLE
              case 'addPost':
                          if(!empty ($_POST)) {
                            $title = $this->request->getParameter($_POST, 'title');
                            $chapo = $this->request->getParameter($_POST, 'chapo');
                            $content = $this->request->getParameter($_POST, 'content');
                            $login = $this->request->getParameter($_POST, 'users_id');
                            $this->ctrlPost->newPost($title, $chapo, $content, $users_id);
                          } else {
                            $view = new View('Add');
                            $view->generer(array());
                          }
                  break;

              //MODIFIER UN ARTICLE MARCHE PAS USERID ET LOGIN COINCIDENT PAS !
              case 'editPost':
                          if(!empty ($_POST) AND !empty($_GET)) {
                            $posts_id = $this->request->getParameter($_GET, 'id');
                            $title = $this->request->getParameter($_POST, 'title');
                            $chapo = $this->request->getParameter($_POST, 'chapo');
                            $content = $this->request->getParameter($_POST, 'content');
                            $login = $this->request->getParameter($_POST, 'login');
                            $this->ctrlPost->editPost($title, $chapo, $content, $login, $posts_id);
                          } else {
                              $posts_id = $this->request->getParameter($_GET, 'id');
                              $post = $this->ctrlPost->dataPost($posts_id);
                              $view = new View('Edit');
                              $view->generer(array('post' => $post));
                          }
                  break;

               //SUPPRIMER UN ARTICLE
               case 'deletePost':
                          if(!empty ($_POST)) {
                            $posts_id = $this->request->getParameter($_POST, 'id');
                            $this->ctrlPost->deletePost($posts_id);
                          } else {
                              $view = new View('Delete');
                              $view->generer(array());
                          }
                  break;

               //INSCRIPTION D'UN USER
               case 'addUser':
                    if(!empty ($_POST)){
                      $login = $this->request->getParameter($_POST, 'login');
                      $email = $this->request->getParameter($_POST, 'email');
                      $password = $this->request->getParameter($_POST, 'password');
                      $this->ctrlUser->addUser($login, $email, $password);
                    } else {
                        $view = new View('AuthReg');
                        $view->generer(array());
                    }
                    break;

               //CONNEXION DE L'UTILISATEUR
               case 'authUser':
                    if(!empty ($_POST)){
                      $login = $this->request->getParameter($_POST, 'login');
                      $email = $this->request->getParameter($_POST, 'email');
                      $password = $this->request->getParameter($_POST, 'password');
                      $this->ctrlUser->userAuth($login, $email, $password);
                    } else {
                        $view = new View('AuthReg');
                        $view->generer(array());
                    }
                    break;

               //DECONNEXION DE L'UTILISATEUR
               case 'disconnectUser':
                    $this->ctrlUser->userDisconnect();
                    break;

               //VISUALISATION DES UTILISATEURS DASHBOARD
               case 'admin':
                   if(isset($_SESSION['admin']) AND !empty ($_SESSION['admin'])){
                    $this->ctrlUser->users();
                    return;
                   }
                        throw new \Exception("Page inexistante");
                    break;

               //CONFIRMATION DE L'USER
               case 'confirmuser':
                    if(isset($_GET) AND !empty($_GET)) {
                      $users_id = $this->request->getParameter($_GET, 'id');
                      $this->ctrlUser->confirmUser($users_id);
                    }
                    break;

                // NON CONFIRMATION DE L'USER REDIR DASHBOARD
                case 'noconfirmuser':
                    if(isset($_GET) AND !empty($_GET)) {
                      $users_id = $this->request->getParameter($_GET, 'id');
                      $this->ctrlUser->noConfirmUser1($users_id);
                       }
                    break;

                     // NON CONFIRMATION DE L'USER REDIR PAGE CONFIRM
                case 'noconfirmuser1':
                    if(isset($_GET) AND !empty($_GET)) {
                      $users_id = $this->request->getParameter($_GET, 'id');
                      $this->ctrlUser->noConfirmUser($users_id);
                          }
                    break;

                     //CONFIRMATION DE L'ADMIN
               case 'confirmadmin':
                    if(isset($_GET) AND !empty($_GET)) {
                      $users_id = $this->request->getParameter($_GET, 'id');
                      $this->ctrlUser->confirmUserAdmin($users_id);
                    }
                    break;

                // NON CONFIRMATION DE L'ADMIN
                case 'noconfirmadmin':
                    if(isset($_GET) AND !empty($_GET)) {
                      $users_id = $this->request->getParameter($_GET, 'id');
                      $this->ctrlUser->noConfirmUserAdmin($users_id);
                    }
                    break;

                //APPROBATION DU COMMENTAIRE
                case 'confirmcomment':
                    if(isset($_GET) AND !empty($_GET)) {
                      $comments_id = $this->request->getParameter($_GET, 'id');
                      $this->ctrlUser->validComment($comments_id);
                    }
                    break;

                //NON APPROBATION DU COMMENTAIRE REDIR DASHBOARD
                case 'noconfirmcomment':
                    if(isset($_GET) AND !empty($_GET)) {
                      $comments_id = $this->request->getParameter($_GET, 'id');
                      $this->ctrlUser->noValidComment1($comments_id);
                      } else {
                              $view = new View('Admin');
                              $view->generer(array());
                    }
                    break;

                    //NON APPROBATION DU COMMENTAIRE REDIR PAGE CONFIRM
                case 'noconfirmcomment2':
                    if(isset($_GET) AND !empty($_GET)) {
                      $comments_id = $this->request->getParameter($_GET, 'id');
                      $this->ctrlUser->noValidComment($comments_id);
                      } else {
                              $view = new View('Admin');
                              $view->generer(array());
                    }
                    break;
               default:
                    throw new \Exception("Action non valide");
              }
              return;
          }  // aucune action définie : affichage de l'accueil
              $this->home();
      } catch (\Exception $e) {
          $this->error($e->getMessage());
      }
    }


    // Affiche la page d'accueil 
    private function home()
    {
      $view = new View("Home");
      $view->generer(array());
    }
    // Affiche une erreur
    private function error($msgError) 
    {
      $view = new View("Error");
      $view->generer(array('msgError' => $msgError));
    }
}

