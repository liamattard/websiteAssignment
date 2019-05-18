<?php


include_once 'connection.php';
session_start();
$d = new Db();
$connect = $d->connect();

if (mysqli_connect_errno()) {

    echo "Failed to connect to MySql: " . mysqli_connect_error();
}


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
            $sql2 = "INSERT INTO favourites (user_ID, food_ID) 
            VALUES ('$row[id]','$food_id')";

            if (!mysqli_query($connect, $sql2)) {

                die('Error: ' . mysqli_error($connect));
            }
        }
    }

}


    mysqli_close($connect);
