<?php

    include_once 'contactphp.php';

    $d = new Db();
    $connect = $d->connect();
    
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="reservationstyle.css">
        <title> Make a reservation </title>
     

    </head>
<main>
<body>
<h1>Book a Table</h1>
<h2> For last minute bookings please call us on +356 21938573</h2> 

<form class = "reservation-form" action = "insertreserv.php" method = "post">
             <input type = "text" name = "name" placeholder = "Name..." class = "nametext">
             <input type = "text" name = "surname" placeholder = "Surname..." class = "surnametext">
             <input type = "text" name = "telephone" placeholder =" Telephone..." class = "telephonetext">
             <input type = "text" name = "email" placeholder = "E-mail..." class = "emailtext">
             <input type = "date" name = "date" class="date">
             <input type = "time" name = "time" class="time">
             <textarea name = "message" placeholder = "Message" rows = "7" cols= "50"></textarea>

            <input type = "submit" >
        </form>



</body>

</main>

</html>
