<!DOCTYPE html>
<html>
<head>
<title> Section B question 4</title>
</head>


<h1> Input information in the fields below </h1>

<form action = "<?php $_PHP_SELF ?>" method = "GET">
Name: <input type = "text" name = "name" />
Age: <input type = "text" name = "age"/>
<input type = "submit"/>
</form>

<?php

    echo $_GET['name'];
?>



</body>
</html>