<?php

    //current time
    $datetime = date("H:i:s");
    //print current time
    echo "Current time : $datetime"."<br/>";

    
    //set cookie to current time
    setcookie("time","$datetime", time()+3600, "/","",0);

?>
<?php

    //retrieved cookie
    $retrievedCook = $_COOKIE["time"];
    echo "Former time: $retrievedCook" ."<br/>";

      $timestamp = strtotime($datetime);
      $timestamp2 = strtotime($retrievedCook);

  

    $time = $timestamp - $timestamp2;

    echo "You accessed this website $time seconds ago";

    

?>