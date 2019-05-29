
<?php


include_once 'contactphp.php';
session_start();
$d = new Db();
$connect = $d->connect();

if (mysqli_connect_errno()) {

    echo "Failed to connect to MySql: " . mysqli_connect_error();
}



if (!empty($_POST["name"])) {
        if(strlen($_POST["name"]) > 50){

        $_SESSION["wrongdetails"] = "not more than 50 characters";
        header('Location: ./contacttrail.php');

        }
} else {
    $_SESSION["wrongdetails"] = "no name filled";
    header('Location: contacttrail.php');
}

if (!empty($_POST["surname"]) ) {

    if(strlen($_POST["surname"]) > 50){

        $_SESSION["wrongdetails"] = "too long surname";
        header('Location: contacttrail.php');
    }
    
} else {
    $_SESSION["wrongdetails"] = "no surname";
    header('Location: contacttrail.php');
}

if (!empty($_POST["email"])) {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $_SESSION["wrongdetails"] = "invalid email";
            header('Location: ./contacttrail.php');
        
        }       
} else {
    $_SESSION["wrongdetails"] = "no email filled";
    header('Location: contacttrail.php');
}

if (!empty($_POST["message"])) {
    $message = clean_input($_POST["message"]);
    if (strlen($message) > 50) {
     
        $_SESSION["wrongdetails"] = "message longer than 50 character";
        header('Location: contacttrail.php');
    }
} else {
  

    $_SESSION["wrongdetails"] = "empty message";
    header('Location: contacttrail.php');
}




if (!isset($_SESSION["wrongdetails"])) {

    $sql2 = "INSERT INTO contact (name, surname, email, subject, message) 
                        VALUES
                        ('$_POST[name]','$_POST[surname]','$_POST[email]','$_POST[subject]', '$_POST[message]' )";

    if (!mysqli_query($connect, $sql2)) {

        die('Error: ' . mysqli_error($connect));
    }
    echo "1 row added";

    mysqli_close($connect);

    header('Location: contacttrail.php');
}





function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
