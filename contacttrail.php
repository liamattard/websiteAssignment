<?php

    session_start();
    require './vendor/autoload.php';
    
    

    require_once __DIR__."/twig.php";

    $loggedIn = false;
    $wrongDetails = null;

    if (isset($_SESSION["wrongdetails"])) {
        $wrongDetails = $_SESSION["wrongdetails"];
    }
    if (isset($_SESSION["name"])) {
        $loggedIn = true;
        echo $twig->render('contactUs.html', ['loggedIn' => $loggedIn, 'user' => $_SESSION["name"], 'page' => true, 'message' => $wrongDetails]);
    
    } else {
        echo $twig->render('contactUs.html', ['loggedIn' => $loggedIn,'page' => false, 'message' => $wrongDetails]);
    
    }

    $_SESSION["wrongdetails"] = null;


