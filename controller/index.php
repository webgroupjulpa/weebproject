<?php
require "../db/db.php";
if($_SESSION["loggedIn"] == false or null){
    $_SESSION["loggedIn"] = false;
}
if(isset($_POST["btnSearch"])){
    $posts = search($_POST);
}else{$posts = fetchall("select * from posts");}

require "../views/index.view.php";