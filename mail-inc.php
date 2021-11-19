<?php

class Email {

	public $mail_body;
	public $mail_object;

	public function __construct(Contact $contact)
	{
     $this->mail_object = 'New contact request via blog' . $contact->firstname . ' ' . $contact->lastname;
     $this->mail_body = $contact->firstname . '' . $contact->lastname . '' . '(' . $contact->email . ') has sent you message: ' . PHP_EOL . PHP_EOL;
     $this->mail_body = 'Object: ' . $contact->object . PHP_EOL;
     $this->mail_body = 'Message: ' . $contact->message;
	}


	public function send() {

$mail_text = $this->createMailText();
$this->writeEmailToLog($mail_text);

}
public function createMailText(){

	$mail_text = $this->mail_object . PHP_EOL;
		$mail_text = $this->mail_body;
		return $mail_text;
}

public function writeEmailToLog($mail_text)
 {
 			$mail_text = PHP_EOL . '***********************************************' . PHP_EOL;
$to = 'contact@mickaelgrole.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    file_put_contents($contact, $mail_text, FILE_APPEND);
	}
 }