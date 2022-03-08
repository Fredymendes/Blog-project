<?php

namespace App\model;

class Forms extends Entity
{
    private $idForms;
    private $lastname;
    private $firstname;
    private $object;
    private $email;
    private $message;
    private $creation_date_form;

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

    public function getObject()
    {
        return $this->object;
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

    public function setObject($object)
    {
        if (is_string($object)) {
            $this->object = $object;
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
