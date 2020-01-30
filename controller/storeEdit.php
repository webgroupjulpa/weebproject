<?php
require "../db/db.php";
if (isset($_POST['btnSubmitEdit'])){
    storeEdit($_POST);
    header("location:/controller");
}
