<?php
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

function storeUser($data)
{
    $result = fetch("select MAX(id) from login");
    $id = $result["MAX(id)"]+1;
    $username = $data["username"];
    $password = $data["password"];
    $query = "insert into login values(
                          $id,
                         '$username',
                         '$password'
    );";
    var_dump($query);
    return fetchAll($query);
}
