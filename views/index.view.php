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
     <h2>Zender - Share your knowledge</h2>

     <div class="navBar">
         <!-- Login button  -->
         <?php if($_SESSION["loggedIn"] == false){ ?>
             <button class="userBtn" > Login </button>
         <?php } ?>

         <!-- Register button  -->
         <?php if($_SESSION["loggedIn"] == false){ ?>
         <button class="userBtn"> Register </button>
         <?php } ?>

         <!-- Logout button  -->
         <?php if($_SESSION["loggedIn"] == true){ ?>
             <button class="userBtn" ><a href="../controller/logout.php">Logout</a></button>
         <?php } ?>

         <!-- New Post button  -->
         <?php if($_SESSION["loggedIn"] == true){ ?>
             <button class="userBtn" ><a href="../controller/newPost.php">New Post</a> </button>
         <?php } ?>
     </div>
    </div>
<!------------------------HEADER end------------------------->

    <div class="userForms">

        <?php
        if ($_SESSION["loggedIn"] == false){?>
     <div class="userForm">
        <form id="loginbox" action="login.php" method="POST">
            <h3>Log in</h3>
            <label for="username">Username:</label>
            <input id="usrnBox" type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input id="pwBox" type="password" id="password" name="password" required>
            <input id="submit" type="submit" value="Submit">
        </form>
     </div>
        <?php } ?>

        <?php
        if ($_SESSION["loggedIn"] == false){?>
     <div class="userForm">
        <form id="registerbox" action="../controller/storeUser.php" method="POST">
            <h3>Register</h3>
            <input type="hidden" id="id" name="id">
            <label for="username">Username:</label>
            <input id="usrnBox" type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input id="pwBox" type="password" id="password" name="password" required>
            <input id="submit" type="submit" value="Submit">
        </form>
     </div>
        <?php } ?>

    </div>
</div>
</body>
</html>

