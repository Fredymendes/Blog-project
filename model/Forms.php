<?php

namespace App\model;

class Forms
{
    private $idForms;
    private $lastname;
    private $firstname;
    private $typeDemande;
    private $email;
    private $message;
    private $creation_date_form;

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
    public function getIdForms()
    {
        return $this->idForms;
    }
    public function getLastName()
    {
        return $this->lastname;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getTypeDemande()
    {
        return $this->typeDemande;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getCreationDate()
    {
        return $this->creation_date_form;
    }

    //Setters
    public function setIdForms($idForms)
    {
        $idForms = (int) $idForms;

        if ($idForms > 0) {
            $this->idForms = $idForms;
        }
    }
    public function setLastName($lastname)
    {
        if (is_string($lastname)) {
            $this->lastname = $lastname;
        }
    }

    public function setFirstName($firstname)
    {
        if (is_string($firstname)) {
            $this->firstname = $firstname;
        }
    }

    public function setTypeDemande($typeDemande)
    {
        if (is_string($typeDemande)) {
            $this->typeDemande = $typeDemande;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email)) {
            $this->email = $email;
        }
    }

    public function setMessage($message)
    {
        if (is_string($message)) {
            $this->message = $message;
        }
    }

    public function setCreationDate($creation_date_form)
    {
        $this->creation_date_form = $creation_date_form;
    }
}
