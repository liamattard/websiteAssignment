<?php
session_start();
require './vendor/autoload.php';



require_once __DIR__."/twig.php";

$loggedIn = false;

if (isset($_SESSION["name"])) {
    $loggedIn = true;
    echo $twig->render('homePage.html', ['loggedIn' => $loggedIn, 'user' => $_SESSION["name"], 'page' => true]);

} else {
    echo $twig->render('homePage.html', ['loggedIn' => $loggedIn,'page' => true]);

}

?>