<?php

namespace App\model;

class FormsManager extends Manager
{
    public function registerForm(Forms $form)
    {
        $db = $this->dbConnect();
        $formsUsers = $db->prepare('INSERT INTO forms(lastname, firstname,
        typedemande, email, message, creation_date_form) 
        VALUES(:lastname, :firstname, :typeDemande, :email, :message, NOW())');
        $formsUsers->bindValue(':lastname', $form->getLastName(), \PDO::PARAM_STR);
        $formsUsers->bindValue(':firstname', $form->getFirstName(), \PDO::PARAM_STR);
        $formsUsers->bindValue(':typeDemande', $form->getTypeDemande(), \PDO::PARAM_STR);
        $formsUsers->bindValue(':email', $form->getEmail(), \PDO::PARAM_STR);
        $formsUsers->bindValue(':message', $form->getMessage(), \PDO::PARAM_STR);

        $formsUsers->execute();
    }
}
