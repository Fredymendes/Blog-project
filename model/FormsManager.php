<?php
require_once("model/Manager.php");

class FormManager extends Manager
{
    function registerForm($lastname, $firstname, $typeDemande, $email, $message)
    {
        $db = $this->dbConnect();
        $formsUsers = $db->prepare('INSERT INTO forms(lastname, firstname, 
        typedemande, email, message, creation_date_form) 
        VALUES(:lastname, :firstname, :typeDemande, :email, :message, NOW())');
        $formsUsers->execute(array(
            'lastname' => $lastname,
            'firstname' => $firstname,
            'typeDemande' => $typeDemande,
            'email' => $email,
            'message' => $message
        ));
    }
} 