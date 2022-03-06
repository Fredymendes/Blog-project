<?php

namespace App\model;

class Post extends Entity
{
    private $idPosts;
    private $idUsers;
    private $pseudo;
    private $title;
    private $wording;
    private $content;
    private $creation_date;

    //Getters
    public function getIdPosts()
    {
        return $this->idPosts;
    }

    public function getIdUsers()
    {
        return $this->idUsers;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }


    public function getTitle()
    {
        return $this->title;
    }

    public function getWording()
    {
        return $this->wording;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    //Setters
    public function setIdPosts($idPosts)
    {
        $idPosts = (int) $idPosts;

        if ($idPosts > 0) {
            $this->idPosts = $idPosts;
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

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        }
    }

    public function setWording($wording)
    {
        if (is_string($wording)) {
            $this->wording = $wording;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        }
    }

    public function setCreationDate($creation_date)
    {
        if (is_string($creation_date)) {
            $this->creation_date = $creation_date;
        }
    }
}
