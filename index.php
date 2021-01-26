<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('Debug', 3);

$f3->route('Get /', function() {
    echo "My Food Page";
//	$view = new Template();
//	echo $view->render('views/home.html');
});

//Run fat free
$f3->run();

