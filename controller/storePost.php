<?php
require "../Post.php";
if (isset($_POST['btnNewPost'])){
$d1 = new Post();
$d1->createPost($_POST);
}
header("location:index.php");