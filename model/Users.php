<?php

namespace App\model;

class Users extends Entity
{
    private $idUsers;
    private $lastName;
    private $firstName;
    private $role;
    private $pseudo;
    private $email;
    private $password;
    private $creation_date;

    //Getters
    public function getIdUsers()
    {
        return $this->idUsers;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getRole()
    {
        return $this->role;
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
    public function setIdUsers($idUsers)
    {
        $idUsers = (int) $idUsers;

        if ($idUsers > 0) {
            $this->idUsers = $idUsers;
        }
    }

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

    public function setRole($role)
    {
        $role = (int) $role;

        if ($role >= 0) {
            $this->idUsers = $role;
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
