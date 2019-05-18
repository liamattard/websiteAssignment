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

if (isset($_SESSION["name"])) {
    $loggedIn = true;
    echo $twig->render('homePage.html', ['loggedIn' => $loggedIn, 'user' => $_SESSION["name"], 'page' => true]);

} else {
    echo $twig->render('homePage.html', ['loggedIn' => $loggedIn,'page' => true]);

}

?>