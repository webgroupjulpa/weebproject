<?php
require "../db/db.php";
if($_SESSION["loggedIn"]== false or null){
    $_SESSION["loggedIn"] = false;
}
require "../views/index.view.php";