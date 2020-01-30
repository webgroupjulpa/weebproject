<?php
require "../db/db.php";
if (isset($_POST['btnNewPost'])){
createPost($_POST);
}
header("location:index.php");