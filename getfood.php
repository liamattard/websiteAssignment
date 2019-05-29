<?php



require './vendor/autoload.php';



include_once 'connection.php';
require_once __DIR__."/twig.php";

session_start();
$d = new Db();
$connect = $d->connect();

if (mysqli_connect_errno()) {

    echo "Failed to connect to MySql: " . mysqli_connect_error();
}


$loggedIn = false;

$sql = "SELECT * FROM food;";
$result = mysqli_query($connect, $sql);
$resultCheck = mysqli_num_rows($result);

$currentfood = array();


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


if ($resultCheck > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        if ($_GET["id"] == $row['id']) {
            $_SESSION['currentFood'] = $_GET["id"];
            $currentfood = array('name' => $row["name"], 'price' => $row["price"], 'image' => $row["img"],'description' => $row["description"],);
        }
    }
}

$loggedIn = false;

if (isset($_SESSION["name"])) {
    $loggedIn = true;
    echo $twig->render('itemPage.html', ['loggedIn' => $loggedIn, 'user' => $_SESSION["name"], 'page' => true, 'food' => $currentfood, 'likeButton' => getLikeColour($connect,$_GET["id"])]);
} else {
    echo $twig->render('itemPage.html', ['loggedIn' => $loggedIn, 'food' => $currentfood,'page' => true,'likeButton' => "grey"]);
}


$connect->close();
