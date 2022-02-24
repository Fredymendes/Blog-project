<?php

namespace App\model;

class UsersManager extends Manager
{
    public function register($users)
    {
        $db = $this->dbConnect();
        $registerUsers = $db->prepare('INSERT INTO 
        users(lastname, firstname, pseudo, email, password, creation_date) 
        VALUES(:lastname, :firstname, :pseudo, :email, :password, NOW())');
        $registerUsers->bindValue(':lastname', $users->getLastName(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':firstname', $users->getFirstName(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':pseudo', $users->getPseudo(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':email', $users->getEmail(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':password', $users->getPassword(), \PDO::PARAM_STR);

        $registerUsers->execute();
    }

    public function connected($pseudo)
    {
        $db = $this->dbConnect();
        $connected = $db->prepare('SELECT idUsers, role, password FROM users WHERE pseudo = :pseudo');
        $connected->execute(array(
        'pseudo' => $pseudo
        ));
        return $connected->fetch();
    }
}
