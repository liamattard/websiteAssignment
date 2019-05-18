<?php
    session_start();    
    require 'vendor/autoload.php';

    //server connection
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
            $food[$counter] = array('name' => $row["name"], 'category' => $row["category"], 'price' => $row["price"], 'image'=>$row["img"],  'colour' => $row["background_colour"]);
            $counter = $counter +1;
        }
    } else {
        echo "0 results";
    }

    
$loggedIn = false;
$_SESSION['foodname'] = null;

if (isset($_SESSION["name"])) {
    $loggedIn = true;
    echo $twig->render('menuPage.html', ['loggedIn' => $loggedIn, 'user' => $_SESSION["name"], 'page' => false,'food' => $food,]);

} else {
    echo $twig->render('menuPage.html', ['loggedIn' => $loggedIn,'food' => $food,]);

}


    $conn->close();
