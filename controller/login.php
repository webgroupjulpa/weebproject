<?php
require "../db/db.php";
login($_POST);
header("location:../controller/index.view.php");