<?php
session_start();
require 'vendor/autoload.php';

//server connection
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = '8bitBurger';


require_once __DIR__."/twig.php";
    


$twig->setLexer($lexer);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



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

function getLikeColour($conn, $foodID)
{
    $colour = "grey";
    if (isset($_SESSION["name"])) {

        $sql3 = "SELECT * FROM `favourites`;";
        $result3 = mysqli_query($conn, $sql3);
        $resultCheck3 = mysqli_num_rows($result3);

        if ($resultCheck3 > 0) {

            while ($row3 = mysqli_fetch_assoc($result3)) {
                if (getUserID($conn) == $row3['user_ID'] &&  $foodID == $row3['food_ID']) {
                    $colour = "red";
                }
            }
        }
    }
    return $colour;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT * FROM category";
$result = $conn->query($sql);


$category = array();
$counter = 0;


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
 
        $category[$counter] = array('name' => $row["name"], 'id' => $row["id"]);
        $counter = $counter + 1;
    }

} else {
    echo "0 results";
}



$sql = "SELECT * FROM food";
$result = $conn->query($sql);


$food = array();
$counter = 0;


if ($result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {

        $colour = getLikeColour($conn, $row["id"]);


        $food[$counter] = array('id'=>$row["id"], 'name' => $row["name"], 'category' => $row["category"], 'price' => $row["price"], 'image' => $row["img"],  'colour' => $row["background_colour"], 'likeButton' => $colour);
        $counter = $counter + 1;
    }
} else {
    echo "0 results";
}

$display = 2;
if (isset($_POST['categoryShow'])) {
    $display = $_POST['categoryShow'];
}

$loggedIn = false;
$_SESSION['foodname'] = null;

if (isset($_SESSION["name"])) {
    $loggedIn = true;
    echo $twig->render('menuPage.html', ['loggedIn' => $loggedIn, 'user' => $_SESSION["name"], 'page' => false, 'food' => $food, 'catagories' => $category, 'display' => $display]);
} else {
    echo $twig->render('menuPage.html', ['loggedIn' => $loggedIn, 'food' => $food,'catagories' => $category, 'display' => $display]);
}


$conn->close();
