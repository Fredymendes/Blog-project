<?php
require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT idPosts, idUsers, title, wording, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') 
        AS creation_date_fr FROM posts ORDER BY creation_date DESC');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT idPosts, idUsers, title, wording, content, 
        DATE_FORMAT(creation_date, \'%d/%m/%Y\') 
        AS creation_date_fr FROM posts WHERE idPosts = ?');
        $req->execute(array($postId));
        $posts = $req->fetch();

        return $posts;
    }

    public function getContent($title, $wording, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(idUsers, title, wording, content, creation_date) 
        VALUES(:idUsers, :title, :wording, :content, NOW())');
        $req->execute(array(
            'idUsers' => $_SESSION['idUsers'],
            'title' => $title,
            'wording' => $wording,
            'content' => $content
        ));
    }

    public function updatePost($id, $title, $wording, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = :title, wording = :wording, content = :content WHERE idPosts = :id');
        $req->execute([
            'title' => $title,
            'wording' => $wording,
            'content' => $content,
            'id' => $id
        ]);
    }

    public function deletePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE idPosts = :id');
        $req->execute([
            'id' => $id,
        ]);
    }
}
