<?php
require"../db/db.php";
$id=$_POST['id'];
$user = fetch("Select user from Posts where id = '$id'");
if($user == $_SESSION["username"] = true){
$edit = fetch("select * from posts where id = '$id'");
require"../views/editPost.view.php";
}
