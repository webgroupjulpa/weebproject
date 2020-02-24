<?php
require "../db/Database.php";
$login = new Database();
$login->login($_POST);
header("location:index.php");