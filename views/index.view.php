<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../controller/style.css">
    <title>Zender</title>
</head>
<body>

<div class="wrapper">
    <div class="header">
     <h1>Zender</h1>
        <hr>
     <h2>Zender - A forum for you</h2>

     <div class="navBar">
         <a class="loginLink" href="../controller/register.php"> Register </a>
         <a class="loginLink" href="../controller/login.php"> Login </a>
     </div>
<?php

if ($_SESSION["loggedIn"] == null or false){?>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Log In">
        </form>
<?php } ?>
<form action="../controller/storeUser.php" method="POST">
            <input type="hidden" id="id" name="id">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="submit">
        </form>

    </div>
</div>
</body>
</html>

