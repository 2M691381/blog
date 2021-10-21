<?php

require_once('vendor/autoload.php');

use blog\Controller\Router;

session_start();

$routeur = new Router();
$routeur->routerRequest();
