<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="homeStyle.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="./menu.php">Menu <i class="fa fa-hamburger"></i></a></li>
        <li><a href="menu.asp">Contact Us <i class="fa fa-phone"></i></a></li>
        <li style="float:right"><a href="contact.asp">Book A Table <i class="fa fa-calendar-minus"></i></a></li>
        <?php
       if (isset($_SESSION["name"])) {
        echo '<li style="float:right"><a href="./logout.php">logout <i class="fa fa-sign-out-alt"></i></a></li>';
        echo '<li style="float:right"><a href="about.asp">';
        echo $_SESSION["name"];
        echo '  <i class="fa fa-user"></i></a></li>';
        
       
         }else{
         echo '<li style="float:right"><a href="./login.php">login <i class="fa fa-user"></i></a></li>';
          }
       ?>

    </ul>
    <div>
        <div wrapper ' style=' text-align: center; '>
            <div style=' display: inline-block; vertical-align: top; '>
            <h1>It' s time for</h1>
            <h1 style="color:#ED5847; text-decoration: underline;">Dinner</h1>
            <p>The pleasure of finding the difference!</p>
            <button class="button">Book a table now!</button>
        </div>
        <div style='display: inline-block; vertical-align: top;'>
            <img src="./assets/chef.gif" alt="chef image" style=" width: 150%;">
        </div>

    </div>
</body>

</html>