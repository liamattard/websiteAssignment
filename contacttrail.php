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
        <link rel="stylesheet" href="contactstyle.css">
        <title> Contact Us </title>
     
    </head>
    
    <main>
    <body> 
        
    <h1 >Contact Us </h1>
    <h2> We would like to hear from you! </h2>

    <div id="map"></div>
<script>
        // Initialize and add the map
        function initMap() {
          // The location of Uluru
          var uluru = {lat: 36.010314, lng: 14.332056};
          // The map, centered at Uluru
          var map = new google.maps.Map(
              document.getElementById('map'), {zoom: 15, center: uluru});
          // The marker, positioned at Uluru
          var marker = new google.maps.Marker({position: uluru, map: map});
        }
            </script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaMqECPd8G0UAzExZpjDSdt4RmtapT3MI&callback=initMap">
</script>
      <p>
        <h3>Find us </h3>
       <address> 8-Bit Burger<br>
                Triq il- Gvernatur<br>
                Comino

    </address>
    <h4> Contact us</h4>
    <p class = "contact">
        Call us on <br>
        +356 21938573
    </p>
    <h5> Opening Hours </h5>
    <p class = "opening">

      Monday-Sunday <br>
      10:00-23:00

    </p>
    



    
    </p>



    <?php
        $sql = "SELECT * FROM contact;";
        $result = mysqli_query($connect, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck >0)
        {
            while($row = mysqli_fetch_assoc($result))
            {

                // echo $row['name'];
            }

        }

    ?>
        
        

        <form class = "contact-form" action = "insert.php" method = "post">
             <input type = "text" name = "name" placeholder = "Name..." class = "nametext">
             <input type = "text" name = "surname" placeholder = "Surname..." class = "surnametext">
             <input type = "text" name = "email" placeholder = "E-mail..." class = "emailtext">
             <input type = "text" name = "subject" placeholder = "Subject..." class = "subjecttext">
             <textarea name = "message" placeholder = "Message" rows = "7" cols= "50"></textarea>
            <input type = "submit" >
        </form>

    
        
        

       

    </main>    
    </body>
    </head>
</html>