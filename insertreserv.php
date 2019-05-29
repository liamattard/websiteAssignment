<?php


include_once 'contactphp.php';

$d = new Db();
$connect = $d->connect();

if (mysqli_connect_errno()) {

    echo "Failed to connect to MySql: " . mysqli_connect_error();
}

if (!empty($_POST["name"])) {
    $name = clean_input($_POST["name"]);
        if(strlen($_POST["name"]) > 50){

        $_SESSION["wrongdetails"] = "Name is longer than 50 characters";
        header('Location: reserve.php');

        }
} else {
    $_SESSION["wrongdetails"] = "Name required";
    header('Location: reserve.php');
    $count ++;
}

if (!empty($_POST["surname"]) ) {
    $surname = clean_input($_POST["surname"]);

    if(strlen($_POST["surname"]) > 50){

        $_SESSION["wrongdetails"] = "Surname is longer than 50 characters";
        header('Location: reserve.php');
        $count ++;
    }
    
} else {
    $_SESSION["wrongdetails"] = "Surname required";
    header('Location: reserve.php');
    $count ++;
}

if (!empty($_POST["email"])) {
    $email = clean_input($_POST["email"]);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $_SESSION["wrongdetails"] = "Invalid email format";
            header('Location: reserve.php');
            $count ++;
        
        }       
} else {
    $_SESSION["wrongdetails"] = "Email required";
    header('Location: reserve.php');
    $count ++;
}

if (!empty($_POST["message"])) {
    $message = clean_input($_POST["message"]);
    if (strlen($message) > 100) {
     
        $_SESSION["wrongdetails"] = "Message too long";
        header('Location: reserve.php');
        $count ++;
    }
} else {
  

    $_SESSION["wrongdetails"] = "Message required";
    header('Location: reserve.php');
    $count ++;
}

$date = date("Y-m-d", strtotime($_POST['date']));
$time = $_POST['time'];
$enteredDate = $date . " " . $time;

if (!isset($_SESSION["wrongdetails"])) {

    $value1 = "INSERT INTO reservations (name, surname, telephone, email, dateandtime, message) 
                            VALUES ('$_POST[name]','$_POST[surname]','$_POST[telephone]','$_POST[email]', '";
    $value2 = "','$_POST[message]' )";


    $sql2 = $value1 . $enteredDate . $value2;
    echo $sql2;
    
    if (!mysqli_query($connect, $sql2)) {

        die('Error: ' . mysqli_error($connect));
    }
    header('Location: reserve.php');
}



mysqli_close($connect);

header('Location: reserve.php');

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>