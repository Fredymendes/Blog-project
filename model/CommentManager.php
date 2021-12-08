<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment, pseudo, DATE_FORMAT(comment_date, \'%d/%m/%Y\') 
        AS comment_date_fr FROM comments INNER JOIN users ON users.idUsers = comments.idUsers WHERE idPosts = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(idUsers, idPosts, comment, comment_date) 
        VALUES(:idUsers, :idPosts, :comment, NOW())');
        $comments->execute(array(
         'idUsers' => $_SESSION['idUsers'],
         'idPosts' => $postId, 
         'comment' => $comment
        ));
    }
}
