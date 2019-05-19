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

include_once 'connection.php';

$d = new Db();
$connect = $d->connect();


if (mysqli_connect_errno()) {

    echo "Failed to connect to MySql: " . mysqli_connect_error();
}


function getUserID($conn)
{

    $sql2 = "SELECT * FROM accounts";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        // output data of each row

        while ($row2 = $result2->fetch_assoc()) {
            if ($_SESSION['name'] == $row2['username']) {
                return $row2['id'];
            }
        }
    }
}

if (!isset($_SESSION["loggedin"])) {
    header('Location: login.php');
} else {
    $loggedIn = true;

    $sql = "SELECT * FROM favourites;";
    $result = mysqli_query($connect, $sql);
    $resultCheck = mysqli_num_rows($result);
    $fav = array();
    $counter = 0;


    if ($resultCheck > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            if (getUserID($connect) == $row['user_ID']) {
               
                $sql2 = "SELECT * FROM food";
                $result2 = mysqli_query($connect, $sql2);
                $resultCheck2 = mysqli_num_rows($result2);
                if ($resultCheck2 > 0) {
        
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        if($row2["id"] == $row["food_ID"]){
                            $fav[$counter] = array('name' => $row2["name"]);
                        }
                    }
                       
        
                $counter = $counter + 1;
            }
     
            }
        }
    }

}
echo $twig->render('fav.html', ['loggedIn' => $loggedIn, 'user' => $_SESSION["name"], 'page' => true,'fav' => $fav]);

    mysqli_close($connect);

