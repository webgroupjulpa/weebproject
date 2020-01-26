<?php
require "../db/db.php";
$_SESSION["loggedIn"] = false;
header("location:index.php");
