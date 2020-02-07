<?php
require "db/Database.php";
$t1 = new Database();
var_dump($t1->fetchAll("select * from posts"));
foreach ($t1 as $t2){
    echo $t2[]
}
var_dump($t1);
