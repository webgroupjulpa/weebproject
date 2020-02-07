<?php
require "../db/Database.php";
if (isset($_POST['btnNewPost'])){
$d1 = new Database();
$d1->createPost($_POST);
}
header("location:index.php");