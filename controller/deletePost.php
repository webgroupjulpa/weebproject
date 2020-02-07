<?php
require "../db/Database.php";
if ($_SESSION["loggedIn"] = true){
    $db= new Database();
    $db->deletePost($_POST);
    header("location:index.php");
}