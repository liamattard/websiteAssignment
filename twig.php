<?php
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

$lexer = new Twig_Lexer($twig, array(
    'tag_block'      => array('{', '}'),
    'tag_variable'   => array('{{', '}}')
));

$twig->setLexer($lexer);
