<?php
    require 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);

    $lexer = new Twig_Lexer($twig,array(
        'tag_block'      => array('{','}'),
        'tag_variable'   => array('{{','}}')
    ));

    $twig->setLexer($lexer);

    echo $twig->render('menuPage.html',array(
        'name' => 'Liam',
        'age' => 52,
        'users' => array(
            array('name'=>'Tom',"age"=>1999),
            array('name'=>'To66     m',"age"=>00),
            array('name'=>'6',"age"=>66),
        )
    ));

