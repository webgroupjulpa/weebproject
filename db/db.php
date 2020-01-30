<?php
session_start();
date_default_timezone_set("Europe/Stockholm");
/**
 * @return PDO
 */
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

/**
 * @param fetchAll $query
 * @return array
 */
function fetchAll($query)
{
    $db = connect();
    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

/**
 * @param  fetch $query
 * @return mixed
 */
function fetch($query)
{
    $db = connect();
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

/**
 * @param user registration
 * @param $data
 * @return array
 */
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

/**
 * user login
 * @param $data
 */
function login($data)
{
    $username = $data["user"];
    $password = $data["password"];
    $query = "select password from login where username = '$username'";
    $hashed = fetch($query);

    if (password_verify($password, $hashed["password"])=== true) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["user"] = $username;
        header("Location:/");
    } else {
   echo "Wrong username or Password!";
    }
}

function createPost($data){
    $user = $_SESSION["user"];
    $date = date("H:i d-m-Y")?? null;
    $result = fetch("select MAX(id) from posts");
    $description = $data["description"];
    $content = $data["content"];
    $id = $result["MAX(id)"] +1;
    $query = "insert into posts values($id,'$date','$description','$content','$user');";
    $success = runQuery($query);
    return $success;
}

function deletePost($data){
    $id = $data["id"];
    $sql = "delete from Posts where Id = '$id'";
    $success = runQuery($sql);
    return $success;
}

function storeEdit($data){
    $description = $data["description"]?? null;
    $content = $data["content"]?? null;
    $user = $_SESSION["user"]?? null;
    $date = date("H:i d-m-Y")?? null;
    $id = $data["id"];
    $int=(int)$id;
    $sql = "update posts set dates='$date', description= '$description',content='$content',user='$user' where id = $int";
    $success = fetch($sql);
    return $success;
}
