<?php

namespace App\model;

class Post
{
    private $postId;
    private $title;
    private $wording;
    private $content;
    private $creation_date;

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
    // crée un fichier entity pour l'hydratation
    //Getters
    public function getPostId()
    {
        return $this->postId;
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
    public function setPostId($postId)
    {
        $postId = (int) $postId;

        if ($postId > 0) {
            $this->postId = $postId;
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
