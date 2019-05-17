<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="login">
        <h1>Register Now</h1>
        <?php

        if (isset($_SESSION["usernameTaken"])) {
            echo '<h2 align="center" style="color: white; font-size:30px;"   >email or username is already taken</h2>';
        }

        ?>
        <form action="insert.php" method="post">

            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="username" id="username" required>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>

            <label for="email">
                <i class="fas fa-envelope"></i>
            </label>
            <input type="text" name="email" placeholder="email" id="email" required>

            <input type="submit" value="Register">
            <a href="/websiteAssignment/login.php">Already have an account, login now</a>

        </form>
    </div>


</body>

</html>
<?php
    unset($_SESSION["usernameTaken"]);
?>