<?php

require('contact-form-inc.php');
require('mail-inc.php');
require('contact-inc.php');

	$contactForm = new ContactForm($_POST);
	$contactForm->handlePostData();