<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['firstname']) ||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Veuillez remplir tous les champs";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$firstname = strip_tags(htmlspecialchars($_POST['firstname']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'contact@mickaelgrole.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulaire de contact:  $name";
$email_body = "Vous avez recu un nouveau message de votre blog.\n\n"."Voici les détails:\n\nNom: $name\n\nPrénom: $firstname\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@mickaelgrole.fr\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
