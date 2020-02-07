<?php
require "../db/Database.php";
if (isset($_POST['btnSubmitEdit'])){
    $post = new Database();
    $post->storeEdit($_POST);
    header("location:/controller");
}
