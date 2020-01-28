<?php
require "../db/db.php";
if (isset($_POST['btnNewPost'])){
makePost($_POST);
var_dump($_POST);
}
//header("location:index.php");