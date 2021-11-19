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
        $req = $db->prepare('SELECT idPosts, idUsers, title, wording, content, 
        DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS creation_date_fr FROM posts WHERE idPosts = ?');
        $req->execute(array($postId));
        $posts = $req->fetch();

        return $posts;
    }

    /**mettre addPost */
    public function getContent($title, $wording, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(idUsers, title, wording, content, creation_date) 
        VALUES(:idUsers, :title, :wording, :content, NOW())');
        $req->execute(array(
            'idUsers' => 1,
            'title' => $title,
            'wording' => $wording,
            'content' => $content
        ));
    }
}