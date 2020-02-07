<?php
require "../db/Database.php";
$_SESSION["loggedIn"] = false;
header("location:index.php");
