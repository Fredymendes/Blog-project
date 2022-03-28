<?php

namespace App\model;

class UsersManager extends Manager
{
    public function register($users)
    {
        $db = $this->dbConnect();
        $registerUsers = $db->prepare(
            'INSERT INTO 
        users(lastname, firstname, pseudo, email, password, creation_date) 
        VALUES(:lastname, :firstname, :pseudo, :email, :password, NOW())'
        );
        $registerUsers->bindValue(':lastname', $users->getLastName(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':firstname', $users->getFirstName(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':pseudo', $users->getPseudo(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':email', $users->getEmail(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':password', $users->getPassword(), \PDO::PARAM_STR);
        if ($users === false) {
            return false;
        }
        $registerUsers->execute();
    }

    public function connected($pseudo)
    {
        $db = $this->dbConnect();
        $connected = $db->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $pseudo = $connected->execute(array('pseudo' => $pseudo));
        if ($pseudo === false) {
            return false;
        }
        return $connected->fetch();
    }
}
