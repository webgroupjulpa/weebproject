<?php
require "../db/Database.php";
if (isset($_POST['btnSubmitEdit'])){
    $post = new Post();
    $post->storeEdit($_POST);
    header("location:/controller");
}
