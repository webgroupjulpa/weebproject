<?php
require "../db/db.php";
if($_SESSION["loggedIn"] == false or null){
    $_SESSION["loggedIn"] = false;
}

$posts = fetchall("select * from posts");
require "../views/index.view.php";