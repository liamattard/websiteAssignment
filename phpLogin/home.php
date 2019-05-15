<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>8Bit Burger</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="homeStyle.css">
  
   
  
</head>

<body>
        <input type="checkbox" id="toggle" class="toggle">
        <label for="toggle" class="burger-menu">
                <span>
                    <img src="assets/burgerMenu.png" alt="Menu">
                </span>
            </label>
    <nav>
        <ul>
            
            <li><a href="#"><img src="assets/logo.png" alt="menu" class="logo"></a></li>
            <li><a href="#"><strong>Home</strong></a></li>
            <li><a href="#"><strong>Menu</strong></a></li>
            <li><a href="#aboutUs"><strong>About</strong></a></li>
            <li><a href="#"><strong>Contact</strong></a></li>
            
        </ul>
    </nav>


    <div class="homePage">
            <div><img id="upper" src="assets/topBun.png" alt="Top Burger" class="upper imageBorder"></div>
            <div><img id="middle" src="assets/Middle.png" alt="Middle Burger" class="middle imageBorder"></div>
            <div><img id="bottom" src="assets/bottomBun.png" alt="Bottom Burger" class="bottom imageBorder"></div>
            <div><img id="landing"src="assets/landing.gif" alt="Smoke" class = "smoke imageBorder"></div>
            <strong><p class="titleText" id="titleText" >8BIT <br><br> BURGER</p></strong>
            <a href="#aboutUs"><img class = "scrollArrow" src="assets/scrollarrow2.gif"></a>
            </div>
        
        
            <script src="main.js"></script>






</html>

