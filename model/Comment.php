<?php

namespace App\model;

class Comment extends Entity
{
    private $idComments;
    private $idUsers;
    private $pseudo;
    private $idPosts;
    private $comment;
    private $wording;
    private $comment_date;

    //Getters
    public function getIdComments()
    {
        return $this->idComments;
    }

    public function getIdUsers()
    {
        return $this->idUsers;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getIdPosts()
    {
        return $this->idPosts;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getWording()
    {
        return $this->wording;
    }

    public function getCommentDate()
    {
        return $this->comment_date;
    }

    //Setters
    public function setIdComments($idComments)
    {
        $idComments = (int) $idComments;

        if ($idComments > 0) {
            $this->idComments = $idComments;
        }
    }

    public function setIdUsers($idUsers)
    {
        $idUsers = (int) $idUsers;

        if ($idUsers > 0) {
            $this->idUsers = $idUsers;
        }
    }

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }

    public function setIdPosts($idPosts)
    {
        $idPosts = (int) $idPosts;

        if ($idPosts > 0) {
            $this->idPosts = $idPosts;
        }
    }

    public function setComment($comment)
    {
        if (is_string($comment)) {
            $this->comment = $comment;
        }
    }

    public function setWording($wording)
    {
        if (is_string($wording)) {
            $this->wording = $wording;
        }
    }

    public function setCommentDate($comment_date)
    {
        if (is_string($comment_date)) {
            $this->comment_date = $comment_date;
        }
    }
}
