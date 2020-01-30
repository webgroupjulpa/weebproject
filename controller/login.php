<?php
require "../db/db.php";
login($_POST);
header("location:index.php");