<?php
require "../db/Database.php";
if ($_SESSION["loggedIn"] = true){
    $db= new Post();
    $db->deletePost($_POST);
    header("location:index.php");
}