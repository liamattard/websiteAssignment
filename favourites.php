<?php
use Twig\Node\ForNode;

include_once 'connection.php';
session_start();
$d = new Db();
$connect = $d->connect();

function deleteDuplicate($conn, $foodID, $userID){

    $duplicate = false;

    $sql3 = "SELECT * FROM `favourites`;";
    $result3 = mysqli_query($conn, $sql3);
    $resultCheck3 = mysqli_num_rows($result3);

    if ($resultCheck3 > 0) {
        
        while ($row3 = mysqli_fetch_assoc($result3)) {
       
            if ($userID == $row3['user_ID'] &&  $foodID == $row3['food_ID']) {
         
                $sql2 = "DELETE FROM favourites WHERE user_ID = $userID and food_ID = $foodID;";
                $duplicate = true;
                    if (!mysqli_query($conn, $sql2)) {                       
                        die('Error: ' . mysqli_error($conn));
                    }
            }
        }
    }
    return $duplicate;
}
if (mysqli_connect_errno()) {

    echo "Failed to connect to MySql: " . mysqli_connect_error();
}




if (!isset($_SESSION["loggedin"])) {
    header('Location: login.php');
} else {

    $food_name = $_POST['foodname'];
    $food_id;

    $sql = "SELECT * FROM food;";
    $result = mysqli_query($connect, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            
            if ($food_name == $row['name']) {
                $food_id = $row['id'];
            }
        }
    }


    $sql = "SELECT * FROM accounts;";
    $result = mysqli_query($connect, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            if ($_SESSION['name'] == $row['username']) {
                if (deleteDuplicate($connect, $food_id,$row['id']) == false){
                    $sql2 = "INSERT INTO favourites (user_ID, food_ID) 
                    VALUES ('$row[id]','$food_id')";
        
                        if (!mysqli_query($connect, $sql2)) {
        
                            die('Error: ' . mysqli_error($connect));
                        }
                }

            }
        }
    }
    if(strcasecmp($_POST['page'], 'menu.php') == 0){
        header('Location: menu.php');
    }
    $x = $_SESSION['currentFood'];
    if(strcasecmp($_POST['page'], 'getfood.php') == 0){
        header('Location: getfood.php?id= '.$x);
    }
    

}

    mysqli_close($connect);

