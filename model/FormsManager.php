<?php

namespace App\model;

class FormsManager extends Manager
{
    public function registerForm($form)
    {
        $db = $this->dbConnect();
        $formsUsers = $db->prepare(
            'INSERT INTO forms(lastname, firstname,
        object, email, message, creation_date_form) 
        VALUES(:lastname, :firstname, :object, :email, :message, NOW())'
        );
        $formsUsers->bindValue(':lastname', $form->getLastName(), \PDO::PARAM_STR);
        $formsUsers->bindValue(':firstname', $form->getFirstName(), \PDO::PARAM_STR);
        $formsUsers->bindValue(':object', $form->getObject(), \PDO::PARAM_STR);
        $formsUsers->bindValue(':email', $form->getEmail(), \PDO::PARAM_STR);
        $formsUsers->bindValue(':message', $form->getMessage(), \PDO::PARAM_STR);
        if ($form == false) {
            return false;
        }
        $formsUsers->execute();
    }
}
