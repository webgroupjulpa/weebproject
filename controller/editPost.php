<?php
require"../Post.php";
$db = new Post();
$id=$_POST['id'];
$user = $db->fetch("Select user from Posts where id = '$id'");
if($user == $_SESSION["username"] = true){
$edit = $db->fetch("select * from posts where id = '$id'");
require"../views/editPost.view.php";
}
