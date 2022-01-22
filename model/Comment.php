<?php

namespace App\model;

class Comment
{
    private $idComments;
    private $idUsers;
    private $postId;
    private $comment;
    private $comment_date;
    private $modify_comment_date;

    public function __construct(array $donnees = [])
    {
        $this->hydrate($donnees);
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter
                $this->$method($value);
            }
        }
    }
    //Getters
    public function getIdComments()
    {
        return $this->idComments;
    }

    public function getIdUsers()
    {
        return $this->idUsers;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getCommentDate()
    {
        return $this->comment_date;
    }

    public function getModifyDate()
    {
        return $this->modify_comment_date;
    }

    //Setters
    public function setIdComment($idComments)
    {
        $idComments = (int) $idComments;

        if ($idComments > 0) {
            $this->idComments = $idComments;
        }
    }

    public function setIdUsers($idUsers)
    {
        $this->idUsers = $idUsers;
    }

    public function setPostId($postId)
    {
        $postId = (int) $postId;

        if ($postId > 0) {
            $this->postId = $postId;
        }
    }

    public function setComment($comment)
    {
        if (is_string($comment)) {
            $this->comment = $comment;
        }
    }

    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }

    public function setModifyDate($modify_comment_date)
    {
        if (is_string($modify_comment_date)) {
            $this->modify_Comment_date = $modify_comment_date;
        }
    }
}
