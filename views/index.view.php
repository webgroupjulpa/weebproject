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
<script>
    function hideDivLogin() {
        const x = document.getElementById("loginForm");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function hideDivRegister() {
        const x = document.getElementById("registerForm");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

<div class="wrapper">
    <!------------------------HEADER start------------------------->
    <div class="header">
        <h1>Zender</h1>
        <hr id="headline">
        <h2>"Send your thoughts and knowledge"</h2>


        <div class="navBar">
            <!-- Login button  -->
            <?php if ($_SESSION["loggedIn"] == false) { ?>
                <button class="userBtn" onclick="hideDivLogin()"> Sign in</button>
            <?php } ?>
            <!-- Register button  -->
            <?php if ($_SESSION["loggedIn"] == false) { ?>
                <button class="userBtn" onclick="hideDivRegister()"> Register</button>
            <?php } ?>

            <!-- Logout button  -->
            <?php if ($_SESSION["loggedIn"] == true) { ?>
                <button class="userBtn"><a href="../controller/logout.php">Logout</a></button>
            <?php } ?>

            <!-- New Post button  -->
            <?php if ($_SESSION["loggedIn"] == true) { ?>
                <button class="userBtn"><a href="../controller/newPost.php">New Post</a></button>
            <?php } ?>

        </div>
    </div>
    <!------------------------HEADER end------------------------->

    <div class="userForms">
        <?php
        if ($_SESSION["loggedIn"] == true) {


            ?>
            <div>
                <p>Du är inloggad som: <?= $_SESSION["user"] ?></p>
            </div>
        <?php } ?>
        <?php
        if ($_SESSION["loggedIn"] == true) {
            ?>
            <form action="../controller/index.php" method="post">
                <input type="text" id="searchword" name="searchword">
                <input type="submit" id="btnSearch" name="btnSearch" value="Search">
            </form>
        <?php } ?>

        <?php
        if ($_SESSION["loggedIn"] == false) {
            ?>
            <div class="userForm" id="loginForm">
                <form id="loginbox" action="login.php" method="POST">
                    <h3>Sign in</h3>
                    <label for="user">Username:</label>
                    <input id="usrnBox" type="text" id="user" name="user" required>
                    <label for="password">Password:</label>
                    <input id="pwBox" type="password" id="password" name="password" required>
                    <input id="submit" type="submit" value="Submit">
                </form>
            </div>
        <?php } ?>

        <?php
        if ($_SESSION["loggedIn"] == false) {
            ?>
            <div class="userForm" id="registerForm">
                <form id="registerbox" action="../controller/storeUser.php" method="POST">
                    <h3>Register</h3>
                    <input type="hidden" id="id" name="id">
                    <label for="user">Username:</label>
                    <input id="usrnBox" type="text" id="user" name="user" required>
                    <label for="password">Password:</label>
                    <input id="pwBox" type="password" id="password" name="password" required>
                    <input id="submit" type="submit" value="Submit">
                </form>
            </div>
        <?php } ?>

    </div>
    <?php
    if ($_SESSION["loggedIn"] == true) { ?>
        <div class="postwrapper">
            <div class="posts">
                <?php foreach ($posts2 as $post) { ?>
                    <div class="post">

                        <div class="postheader">
                            <p id="postedBy">posted by:</p>
                            <h3><?= $post->user ?></h3>
                        </div>
                        <hr id="postline">
                        <h2><?= $post->description ?></h2>
                        <p id="posttext"><?= $post->content ?></p>
                        <!--    <p>--><? //=$post["id"]
                        ?><!--</p>-->

                        <div class="postbuttons">
                            <p id="date"><?= $post->dates ?></p>
                            <?php if ($_SESSION["user"] === $post->user) { ?>

                                <form action="../controller/editPost.php" method="post" id="editPost">
                                    <input type="hidden" name="id" id="id" value="<?= $post->id ?>">
                                    <input class="editPost" type="submit" value="Edit">
                                </form>

                                <form action="../controller/deletePost.php" method="post" id="deletePost">
                                    <input type="hidden" name="id" id="id" value="<?= $post->id ?>">
                                    <input class="deletePost" type="submit" value="X">
                                </form>

                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>


</div>
</body>
</html>

