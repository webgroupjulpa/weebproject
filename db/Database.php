<?php

session_start();
date_default_timezone_set('Europe/Stockholm');
class Database
{

    public $db;

    public function __construct()
    {
        $dsn = "sqlite:" . __DIR__ . "/db.sqlite";
        try {
            $this->db = new PDO($dsn);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $this->db;
        } catch (PDOException $e) {
            echo $e->errorInfo;
            exit();
        }
    }

    public function fetchAll($query, array $params = [])
    {
        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $param) {
            $stmt->bindValue($key, $param);
        }
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    public function fetch($query, array $params = [])
    {
        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $param) {
            $stmt->bindValue($key, $param);
        }
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }

    public function runQuery($query, array $params = [])
    {

        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $param) {
            $stmt->bindValue($key, $param);
        }
        return $stmt->execute();

    }

    public function storeUser($data)
    {
        $result = $this->fetch("select MAX(id) from login");
        $id = $result->{'MAX(id)'} + 1;
        $username = $data["user"];
        $password = password_hash($data["password"] ?? null, PASSWORD_DEFAULT);
        $query = "insert into login values(
                          :id,
                         :username,
                         :password
    );";
        return $this->fetchAll($query, ["id" => $id, "username" => $username, "password" => $password]);
    }

    public function login($data)
    {
        $username = $data["user"];
        $password = $data["password"];
        $query = "select password from login where username = :username";
        $hashed = $this->fetch($query, ["username" => $username]);

        if (password_verify($password, $hashed->password) === true) {
            $_SESSION["loggedIn"] = true;
            $_SESSION["user"] = $username;
            header("Location:index.php");
        } else {
            echo "Wrong username or Password!";
        }

    }
}





