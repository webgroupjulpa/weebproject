<?php
require "../db/db.php";
storeUser($_POST);
header("location:index.php");
