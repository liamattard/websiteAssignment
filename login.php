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
        <h1>Login</h1>
        <?php

        if (isset($_SESSION["error"])) {
            echo '<h2 align="center" style="color: white; font-size:30px;"   >Incorrect details</h2>';
        }

        ?>
        <form action="authenticate.php" method="post">

            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Email or username" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" value="Login">

        </form>
        <a href="/websiteAssignment/register.php">Don't have an account, register now</a>
        <br>
        <a href="/websiteAssignment/homePage.php">Continue as Guest</a>
    </div>


</body>

</html>

<?php
unset($_SESSION["error"]);
?>