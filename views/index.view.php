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
<!------------------------HEADER start------------------------->
    <div class="header">
     <h1>Zender</h1>
        <hr>
     <h2>Zender - A forum for you</h2>

     <div class="navBar">
         <a class="userBtn"> Register </a>

         <?php if($_SESSION["loggedIn"] == false){ ?>
         <a class="userBtn"> Login </a>
         <?php } ?>

         <?php if($_SESSION["loggedIn"] == true){ ?>
         <a class="userBtn" href="../controller/logout.php"> Logout </a>
         <?php } ?>
     </div>
    </div>
<!------------------------HEADER end------------------------->

    <div class="userForms">

     <div class="userForm">
<?php
if ($_SESSION["loggedIn"] == false){?>
        <form id="loginbox" action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Log In">
        </form>
<?php } ?>
     </div>
     <div class="userForm">

        <form id="registerbox" action="../controller/storeUser.php" method="POST">
            <input type="hidden" id="id" name="id">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="register">
        </form>
     </div>
    </div>

</div>
</body>
</html>

