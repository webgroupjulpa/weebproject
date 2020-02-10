<?php
require_once "db/Database.php";

class Post extends Database
{
    public function createPost($data)
    {
        $user = $_SESSION["user"];
        $date = date("H:i d-m-Y") ?? null;
        $result = $this->fetch("select MAX(id) from posts");
        $content = $data["content"];
        $description = $data["description"];
        $id = $result->{'MAX(id)'} + 1;
        $query = "insert into posts values(:id,:date,:description,:content,:user);";
        $success = $this->runQuery($query,["id"=>$id,"date" => $date,"description" => $description, "content" => $content, "user" => $user]);
        return $success;
    }

    public function deletePost($data)
    {
        $id = $data["id"];
        $sql = "delete from Posts where Id = '$id'";
        $success = $this->runQuery($sql);
        return $success;
    }

    public function storeEdit($data)
    {
        $description = $data["description"] ?? null;
        $content = $data["content"] ?? null;
        $user = $_SESSION["user"] ?? null;
        $date = date("H:i d-m-Y") ?? null;
        $id = $data["id"];
        $sql = "update posts set dates=:date, description= :description,content=:content,user=:user where id = '$id'";
        $success = $this->fetch($sql,["date" => $date,"description" => $description, "content" => $content, "user" => $user]);
        return $success;
    }

    public function search($data)
    {
        $searchword = $data["searchword"];
        $query = "select * from posts where description or content like '%' || :searchword || '%'";
        $success = $this->fetchAll($query ,["searchword" => $searchword]);
        return $success;
    }

}
