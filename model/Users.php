<?php

namespace App\model;

class Users
{
    private $lastName;
    private $firstName;
    private $pseudo;
    private $email;
    private $password;
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
    //Getters
    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    //Setters
    public function setLastName($lastName)
    {
        if (is_string($lastName)) {
            $this->lastName = $lastName;
        }
    }

    public function setFirstName($firstName)
    {
        if (is_string($firstName)) {
            $this->firstName = $firstName;
        }
    }

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email)) {
            $this->email = $email;
        }
    }

    public function setPassword($password)
    {
        if (is_string($password)) {
            $this->password = $password;
        }
    }

    public function setCreationDate($creation_date)
    {
        if (is_string($creation_date)) {
            $this->creation_date = $creation_date;
        }
    }
}
