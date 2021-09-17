<?php
require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT idPosts, idUsers, title, wording, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT idPosts, idUsers, title, wording, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS creation_date_fr FROM posts WHERE idUsers = ?');
        $req->execute(array($postId));
        $posts = $req->fetch();

        return $posts;
    }
}