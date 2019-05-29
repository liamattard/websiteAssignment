
<?php


include_once 'contactphp.php';
session_start();
$d = new Db();
$connect = $d->connect();

if (mysqli_connect_errno()) {

    echo "Failed to connect to MySql: " . mysqli_connect_error();
}


if (!empty($_POST["name"])) {
    $name = clean_input($_POST["name"]);
        if(strlen($_POST["name"]) > 50){

        $_SESSION["wrongdetails"] = "Name is longer than 50 characters";
        header('Location: contacttrail.php');

        }
} else {
    $_SESSION["wrongdetails"] = "Name required";
    header('Location: contacttrail.php');
    $count ++;
}

if (!empty($_POST["surname"]) ) {
    $surname = clean_input($_POST["surname"]);

    if(strlen($_POST["surname"]) > 50){

        $_SESSION["wrongdetails"] = "Surname is longer than 50 characters";
        header('Location: contacttrail.php');
        $count ++;
    }
    
} else {
    $_SESSION["wrongdetails"] = "Surname required";
    header('Location: contacttrail.php');
    $count ++;
}

if (!empty($_POST["email"])) {
    $email = clean_input($_POST["email"]);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $_SESSION["wrongdetails"] = "Invalid email format";
            header('Location: contacttrail.php');
            $count ++;
        
        }       
} else {
    $_SESSION["wrongdetails"] = "Email required";
    header('Location: contacttrail.php');
    $count ++;
}

if (!empty($_POST["message"])) {
    $message = clean_input($_POST["message"]);
    if (strlen($message) > 100) {
     
        $_SESSION["wrongdetails"] = "Message too long";
        header('Location: contacttrail.php');
        $count ++;
    }
} else {
  

    $_SESSION["wrongdetails"] = "Message required";
    header('Location: contacttrail.php');
    $count ++;
}

//if more than 1 mistake is found
// if($count > 1)
// {
//     $_SESSION["wrongdetails"] = "*More than one mistake was found in your submission";
//     header('Location: contacttrail.php');

// }


// $count = 0;

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

header('Location: contacttrail.php');



function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>