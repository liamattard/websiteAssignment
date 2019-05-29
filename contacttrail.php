<?php

    session_start();
    require './vendor/autoload.php';
    
    
    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);
    
    $lexer = new Twig_Lexer($twig, array(
        'tag_block'      => array('{', '}'),
        'tag_variable'   => array('{{', '}}')
    ));
    
    $twig->setLexer($lexer);
    
    $loggedIn = false;
    $wrongDetails = false;

    if (isset($_SESSION["wrongdetails"])) {
        $wrongDetails = true;
    }
    if (isset($_SESSION["name"])) {
        $loggedIn = true;
        echo $twig->render('contactUs.html', ['loggedIn' => $loggedIn, 'user' => $_SESSION["name"], 'page' => true, 'error' => $wrongDetails, 'message' => $_SESSION["wrongdetails"]]);
    
    } else {
        echo $twig->render('contactUs.html', ['loggedIn' => $loggedIn,'page' => false,'error' => $wrongDetails, 'message' => $_SESSION["wrongdetails"]]);
    
    }





