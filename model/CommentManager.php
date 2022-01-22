<?php

namespace App\model;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment, pseudo AS idUsers, DATE_FORMAT(comment_date, \'%d/%m/%Y\') 
        AS commentDate FROM comments INNER JOIN users ON users.idUsers = comments.idUsers WHERE idPosts = ? 
        ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        $comments = $comments->fetchAll();
        $c = [];
        foreach ($comments as $comment) {
            //rajoute dans le tableau vide la variable comment sous forme d'objet
            $c[] = new Comment($comment);
        }
        return $c;
    }

    public function postComment(Comment $comment)
    {
        $db = $this->dbConnect();
        $comments = $this->$db->prepare('INSERT INTO comments(idUsers, idPosts, comment, comment_date) 
        VALUES(:idUsers, :idPosts, :comment, NOW())');
         $comments->bindValue(':idPosts', $comment->getPostId(), \PDO::PARAM_INT);
         $comments->bindValue(':idUsers ', $comment->getIdUsers(), \PDO::PARAM_INT);
         $comments->bindValue(':comment', $comment->getComment(), \PDO::PARAM_STR);
         $comments->bindValue(':comment_date', $comment->getCommentDate(), \PDO::PARAM_STR);

         $comments->execute();
    }
}
