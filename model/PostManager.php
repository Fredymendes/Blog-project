<?php

namespace App\model;

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT idPosts, idUsers, title, wording, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') 
        AS creationDate FROM posts ORDER BY creation_date DESC');
        $data = [];
        while ($data = $posts->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = new Post($data);
        }
        return $data;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT idPosts, idUsers, title, wording, content, 
        DATE_FORMAT(creation_date, \'%d/%m/%Y\') 
        AS creation_date_fr FROM posts WHERE idPosts = ?');
        $req->execute(array($postId));
        $posts = $req->fetch();
        $posts = new Post($posts);
        return $posts;
    }

    public function addPost(Post $postData)//$title, $wording, $content
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(idUsers, title, wording, content, creation_date) 
        VALUES(:idUsers, :title, :wording, :content, NOW())');
        $req->bindValue(':idUsers', $postData->getPostId(), \PDO::PARAM_INT);
        $req->bindValue(':title', $postData->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':wording', $postData->getWording(), \PDO::PARAM_STR);
        $req->bindValue(':content', $postData->getContent(), \PDO::PARAM_STR);

        $req->execute();
        /*$req->execute(array(
            'idUsers' => $_SESSION['idUsers'],
            'title' => $title,
            'wording' => $wording,
            'content' => $content
        ));*/
    }

    public function updatePost(Post $updatePost)//$id, $title, $wording, $content
    {
        $db = $this->dbConnect();
        $req = $this->$db->prepare('UPDATE posts SET title = :title, wording = :wording, content = :content 
        WHERE idPosts = :id');
        $req->bindValue(':id', $updatePost->getPostId(), \PDO::PARAM_INT);
        $req->bindValue(':title', $updatePost->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':wording', $updatePost->getWording(), \PDO::PARAM_STR);
        $req->bindValue(':content', $updatePost->getContent(), \PDO::PARAM_STR);
        $req->execute();
        /*$req->execute([
            'title' => $title,
            'wording' => $wording,
            'content' => $content,
            'id' => $id
        ]);*/
    }

    public function deletePost($id)//$id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE idPosts = :id');
        $req->execute([
            'id' => $id,
        ]);
    }
}
