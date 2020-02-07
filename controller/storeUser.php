<?php
require "../db/Database.php";
$post = new Database();
$post->storeUser($_POST);
header("location:index.php");
