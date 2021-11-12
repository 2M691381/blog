<?php

class ContactForm {

	protected $required_fields = [
    'firstname',
    'lastname',
    'email',
    'object',
    'message',
	];


protected $post_data;

public function __construct($post_data)
{
	$this->post_data = $post_data;
}

	public function handlePostData()

{
	$this->checkRequiredFileds();

$contact = $this->createContact();
$this->sendEmail($contact);

}

public function checkRequiredFileds(){

foreach ($this->required_fields as $key) {
		if (!$this->post_data[$key]) {
			throw new Error('The required fields '. $key . ' is not the post array');
}
}
}

public function createContact(){

	return new Contact($this->post_data['firstname'], $this->post_data['lastname'], $this->post_data['email'], $this->post_data['object'], $this->post_data['message']);

}

public function sendEmail(){

$email = new Email($contact);
$email->send();


}


}