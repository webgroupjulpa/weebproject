<?php

session_start();
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

    public function fetchAll($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    public function fetch($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }

    public function runQuery($query)
    {
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

    public function storeUser($data)
    {
        $result = fetch("select MAX(id) as id from login");
        $id = $result->id + 1;
        $username = $data->username;
        $password = password_hash($data["password"] ?? null, PASSWORD_DEFAULT);
        $query = "insert into login values(
                          $id,
                         '$username',
                         '$password'
    );";
        return fetchAll($query);
    }

    public function login($data)
    {
        $username = $data["user"];
        $password = $data["password"];
        $query = "select password from login where username = '$username'";
        $hashed = $this->fetch($query);

        if (password_verify($password, $hashed->password) === true) {
            $_SESSION["loggedIn"] = true;
            $_SESSION["user"] = $username;
            header("Location:index.php");
            var_dump($_SESSION);
        } else {
            echo "Wrong username or Password!";
        }

    }
    public function createPost($data){
        $user = $_SESSION["user"];
        $date = date("H:i d-m-Y")?? null;
        $result = $this->fetch("select MAX(id) from posts");
        $description = $data["description"];
        $content = $data["content"];
        var_dump($result);
        $id = $result-> {'MAX(id)'} +1;
        $query = "insert into posts values($id,'$date','$description','$content','$user');";
        $success = $this->runQuery($query);
        return $success;
    }
    public function deletePost($data){
        $id = $data["id"];
        $sql = "delete from Posts where Id = '$id'";
        $success = $this->runQuery($sql);
        return $success;
    }
    public function storeEdit($data){
        $description = $data["description"]?? null;
        $content = $data["content"]?? null;
        $user = $_SESSION["user"]?? null;
        $date = date("H:i d-m-Y")?? null;
        $id = $data["id"];
        $int=(int)$id;
        $sql = "update posts set dates='$date', description= '$description',content='$content',user='$user' where id = $int";
        $success = $this->fetch($sql);
        return $success;
    }
    public function search($data){
        $searchword = $data["searchword"];
        $query ="select * from posts where description or content like '%$searchword%'";
        $success = $this->fetchAll($query);
        return $success;
    }

}




