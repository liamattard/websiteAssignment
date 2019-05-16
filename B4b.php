<!DOCTYPE html>
<html>
<head>
<title> Section B question 4</title>
</head>


<h1> Input information in the fields below </h1>

<form action = "<?php $_PHP_SELF ?>" method = "POST">
Name: <input type = "text" name = "name" />
Age: <input type = "text" name = "age"/>
<input type = "submit"/>
</form>

<?php

if(isset($_POST["name"]) && isset($_POST["age"]))
{
   session_start();
    $_SESSION["name"]= $_POST["name"];
    $_SESSION["age"]= $_POST["age"];
}
    
?>


</body>
</html>