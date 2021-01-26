<?php

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

$f3->route('GET /', function() {
    // echo "Adding index page";
    $view = new Template();
    echo $view->render('views/home.html');
});


// Define a "breakfast" route
$f3->route('GET /breakfast', function() {
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

$f3->route('GET /lunch', function() {
    $view = new Template();
    echo $view->render('views/lunch.html');
});

$f3->route('GET /lunch/sandwich', function() {
    $view = new Template();
    echo $view->render('views/sandwich.html');
});

$f3->route('GET /@first/@last', function($f3, $params) {
    echo "Hello, " .$params['first']." ".$params['last'];

});

$f3->route('GET /breakfast/@item', function($f3, $params) {
    $item = $params['item'];
    $menu = array('eggs', 'waffles', 'pancakes');
    if(in_array($menu, $menu)){
        switch($item) {
            case 'eggs' :
                $view = new Template();
                echo $view->render('views/eggs.html');
                break;
            case 'pancakes':
                echo "Swedish or American?";
                break;
            case 'waffles' :
               $f3->reroute("http://thewafflehouse.com");
                break;
            default:
                $f3->error(404);
        }
        echo "We serve $item";
        // for example if the item displayed is in the array, we go to a certain view

        //$f3->route('GET /lunch/item', function() {
        //    $view = new Template();
        //    echo $view->render('views/item.html');
        //});

    } else {
        echo "Sorry we don't serve $item";
    }
//    $view = new Template();
//    echo $view->render('views/.html');
});



//Run fat free
$f3->run();

