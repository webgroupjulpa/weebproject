<?php
require "../db/db.php";
if ($_SESSION["loggedIn"] = true){
    deletePost($_POST);
    header("location:index.php");
}