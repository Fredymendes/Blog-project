<?php

namespace App\model;

class CommentManager extends Manager
{
    public function getComments($id)
    {
        $db = $this->dbConnect();
        $listComments = $db->prepare(
            'SELECT *, DATE_FORMAT(comment_date, \'%d/%m/%Y\') 
        AS commentDate FROM comments INNER JOIN users 
        ON users.idUsers = comments.idUsers 
        WHERE idPosts = ? AND validate = 1 ORDER BY comment_date ASC'
        );
        $listComments->execute(array($id));
        $listComments = $listComments->fetchAll();
        $c = [];
        foreach ($listComments as $listComment) {
            //rajoute dans le tableau vide la variable comment sous forme d'objet
            $c[] = new Comment($listComment);
        }
        return $c;
    }

    public function getWaitingComments()
    {
        $db = $this->dbConnect();
        $comment = $db->prepare(
            'SELECT *, DATE_FORMAT(comment_date, \'%d/%m/%Y\') 
        AS commentDate FROM comments INNER JOIN users 
        ON users.idUsers = comments.idUsers INNER JOIN posts ON posts.idPosts = comments.idPosts 
        WHERE validate = 0 ORDER BY comment_date ASC'
        );
        $comment->execute(array());
        $c = [];
        foreach ($comment as $listComment) {
            //rajoute dans le tableau vide la variable comment sous forme d'objet
            $c[] = new Comment($listComment);
        }

        return $c;
    }

    public function validateComments($comment)
    {
        $db = $this->dbConnect();
        $validateComments = $db->prepare('UPDATE comments SET validate = 1 WHERE idComments = ?');

        $validateComments->execute(array($comment));
    }

    public function deleteComments($comment)
    {
        $db = $this->dbConnect();
        $deleteComments = $db->prepare('DELETE FROM comments WHERE idComments = ?');

        $deleteComments->execute(array($comment));
    }

    public function addComment($postComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO comments(idComments, idUsers, idPosts, comment, comment_date) 
        VALUES(:idComments, :idUsers, :idPosts, :comment, NOW())'
        );
        $req->bindValue(':idComments', $postComment->getIdComments(), \PDO::PARAM_INT);
        $req->bindValue(':idUsers', $postComment->getIdUsers(), \PDO::PARAM_INT);
        $req->bindValue(':idPosts', $postComment->getIdPosts(), \PDO::PARAM_INT);
        $req->bindValue(':comment', $postComment->getComment(), \PDO::PARAM_STR);

        $req->execute();
    }
}
