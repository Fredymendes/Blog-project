<?php

namespace App\model;

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $listPosts = $db->query(
            'SELECT *, 
        DATE_FORMAT(posts.creation_date, \'%d/%m/%Y\') AS creationDate FROM posts 
        INNER JOIN users ON users.idUsers = posts.idUsers ORDER BY posts.creation_date DESC'
        );
        $listPosts = $listPosts->fetchAll();
        if ($listPosts === false) {
            return false;
        }
        $p = [];
        foreach ($listPosts as $listPost) {
            //rajoute dans le tableau vide la variable comment sous forme d'objet
            $p[] = new Post($listPost);
        }
        return $p;
    }

    public function getPost($idPosts)
    {
        $db = $this->dbConnect();
        $post = $db->prepare(
            'SELECT *, 
        DATE_FORMAT(posts.creation_date, \'%d/%m/%Y\') AS creationDate FROM posts 
        INNER JOIN users ON users.idUsers = posts.idUsers WHERE idPosts = ?'
        );
        $post->execute(array($idPosts));
        $posts = $post->fetch();
        if ($posts === false) {
            return false;
        }
        $posts = new Post($posts);

        return $posts;
    }

    public function addPost($postData)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO posts(idUsers, title, wording, content, creation_date) 
        VALUES(:idUsers, :title, :wording, :content, NOW())'
        );
        $req->bindValue(':idUsers', $postData->getIdUsers(), \PDO::PARAM_INT);
        $req->bindValue(':title', $postData->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':wording', $postData->getWording(), \PDO::PARAM_STR);
        $req->bindValue(':content', $postData->getContent(), \PDO::PARAM_STR);
        if ($postData === false) {
            return false;
        }
        $req->execute();
    }

    public function updatePost($updatePost)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'UPDATE posts SET title = :title, wording = :wording, content = :content 
        WHERE idPosts = :id'
        );
        $req->bindValue(':title', $updatePost->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':wording', $updatePost->getWording(), \PDO::PARAM_STR);
        $req->bindValue(':content', $updatePost->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':id', $updatePost->getIdPosts(), \PDO::PARAM_INT);
        if ($updatePost == false) {
            return false;
        }
        $req->execute();
    }

    public function deletePost($deletePost)
    {
        $db = $this->dbConnect();
        // Supprimer les commentaires associés au post
        $req = $db->prepare('DELETE FROM comments WHERE idPosts = ?');
        $req->execute(array($deletePost));
        // Supprimer le post
        $req = $db->prepare('DELETE FROM posts WHERE idPosts = ?');
        $req->execute(array($deletePost));
        return true;
    }
}
