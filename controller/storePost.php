<?php
require "../db/db.php";
if (isset($_POST['btnNewPost'])){
makePost($_POST);
}
header("location:index.php");