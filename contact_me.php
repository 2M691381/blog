<?php

use phpmailer\phpmailer\PHPMailer;

//Pour utiliser notre objet PHPMailer
use phpmailer\phpmailer\Exception;

// Pour utiliser l'objet Exeption

use phpmailer\phpmailer\SMTP;


require 'vendor/autoload.php';


require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if(!empty($_POST)){


    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $object = htmlspecialchars($_POST['object']);
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

    $erreur = NULL;


    if (!isset($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur .= '<div> L\'email n\'est pas valide.</div>';
    }

    if (!isset($_POST['firstname']) || strlen($firstname) < 2) {
        $erreur .= '<div> Le nom doit contenir au minimum 2 caractères.</div>';
    }

    if (!isset($_POST['lastname']) || strlen($lastname) < 2) {
        $erreur .= '<div> Le nom doit contenir au minimum 2 caractères.</div>';
    }

    if (!isset($_POST['message']) || strlen($message) < 1) {
        $erreur .= '<div> Le message doit contenir ne doit pas être vide.</div>';
    }

if (!isset($_POST['object']) || strlen($object) < 1) {
        $erreur .= '<div> Le message doit contenir ne doit pas être vide.</div>';
    }

    if (!isset($erreur)) {

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP(); //Pour preciser que c'est du SMTP
            $mail->Host = 'smtp.gmail.com';  // Le serveur smtp de google
            $mail->SMTPAuth = true;                               // On active l'authentification
            $mail->Username = 'famillegrole@gmail.com';                 // SMTP username
            $mail->Password = 'znbkrydtxhqbochj';                           // Le mot de passe que vous avez récupéré
            $mail->SMTPSecure = 'tls';                            // Parameter de sécurité mis sur TLS
            $mail->Port = 587;                                    // Le port donne par google pour son SMTP

            $mail->setFrom($email, $firstname, $lastname); // De qui est l' email
            $mail->addReplyTo($email, $firstname, $lastname); // Option pour avoir le reply
            $mail->addAddress('famillegrole@gmail.com', 'Mickaël Grolé'); //La boite mail où vous voulez recevoir les mails


            $mail->isHTML(true); //Met le mail au format HTML
            $mail->Subject = $object; // On parametre l'objet
            $mail->Body = $message; // Le message pour les boites html
            $mail->AltBody = $message; //Le message pour les boites non html
            $mail->SMTPDebug = 0; //On désactive les logs de debug

           if ($mail->send()) {
                echo '<div>Mail envoyé ! Je vous recontacterais sous 24H . Merci pour votre interêt.</div>';
                        header('Refresh: 4; index.php');
            } else {
                $erreur = '<div>Echec dans l\'envoi du mail</div>';
            }
        } catch (Exception $e) {
            $erreur = $e;
        }
    }
}

?>
<?= isset($erreur) ? $erreur : '' ?>
