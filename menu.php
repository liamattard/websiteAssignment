<?php
    session_start();    
    require 'vendor/autoload.php';

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = '8bitBurger';


    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);

    $lexer = new Twig_Lexer($twig,array(
        'tag_block'      => array('{','}'),
        'tag_variable'   => array('{{','}}')
    ));

    $twig->setLexer($lexer);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "SELECT * FROM food";
    $result = $conn->query($sql);
    
    
    $food = array(

    );
    $counter = 0;

    if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()) {
            $food[$counter] = array('name' => $row["name"], 'category' => $row["category"]);
            // echo "id: " . $row["id"]. " - Name: " . $row["category"]. " " . $row["name"]. " " . $row["price"]. "<br>";
            $counter = $counter +1;
        }
    } else {
        echo "0 results";
    }

    
    include('views/menuChoiceStyle.css');
    echo $twig->render('menuChoice.html',['food' => $food]);
    // include('views/menuChoice.html');


    $conn->close();

    ?> 
    