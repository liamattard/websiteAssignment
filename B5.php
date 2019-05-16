<?php

    session_start();
?>


<!DOCTYPE html>
<html>
<head>
<title> Section B question 5</title>
</head>


<h1> Session Information </h1>


<?php
     echo "Name is: ".$_SESSION["name"].".<br>";
     echo "Age is: ".$_SESSION["age"].".<br>";

?>

</body>
</html>