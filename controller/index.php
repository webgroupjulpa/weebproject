<?php
require "../db/Database.php";
if($_SESSION["loggedIn"] == false or null){
    $_SESSION["loggedIn"] = false;
    var_dump($_SESSION);
}
$posts2 = [];
if(isset($_POST["btnSearch"])){
    $posts = new Database();
    $posts2 = $posts->search($_POST);
}else{
    $posts = new Database();
    $posts2 = $posts->fetchAll("select * from posts");

}


require "../views/index.view.php";