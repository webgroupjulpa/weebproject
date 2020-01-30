<?php
session_start();
date_default_timezone_set("Europe/Stockholm");
function connect()
{
    try {
        $dsn = "sqlite:" . __DIR__ . "/db.sqlite";
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    } catch (PDOException $e) {
        echo $e->errorInfo;
        exit();
    }
}

function fetchAll($query)
{
    $db = connect();
    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

function fetch($query)
{
    $db = connect();
    var_dump($query);
    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = $stmt->fetch();
    return $results;
}

function runQuery($query)
{
    $db = connect();
    $stmt = $db->prepare($query);
    return $stmt->execute();
}
function storeUser($data)
{
    $result = fetch("select MAX(id) from login");
    $id = $result["MAX(id)"] + 1;
    $username = $data["username"];
    $password = password_hash($data["password"] ?? null, PASSWORD_DEFAULT);
    $query = "insert into login values(
                          $id,
                         '$username',
                         '$password'
    );";
    return fetchAll($query);
}

function login($data)
{
    $username = $data["username"];
    $password = $data["password"];
    $query = "select password from login where username = '$username'";
    $hashed = fetch($query);

    if (password_verify($password, $hashed["password"])=== true) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["username"] = $username;
        header("Location:/");
    } else {
   echo "Wrong username or Password!";
    }
}
function makePost($data){
    $user = $_SESSION["username"];
    $date = date("H:i d-m-Y")?? null;
    $result = fetch("select MAX(id) from posts");
    $description = $data["description"];
    $content = $data["content"];
    $id = $result["MAX(id)"] +1;
    $query = "insert into posts values($id,'$date','$description','$content','$user');";
    $success = runQuery($query);
    return $success;
}
