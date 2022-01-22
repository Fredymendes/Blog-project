<?php

namespace App\model;

class UsersManager extends Manager
{
    public function register(Users $users)//$lastname, $firstname, $pseudo, $email, $password
    {
        $db = $this->dbConnect();
        $registerUsers = $this->$db->prepare('INSERT INTO 
     users(lastname, firstname, pseudo, email, password, 
     creation_date) 
     VALUES(:lastname, :firstname, :pseudo, :email, :password, NOW())');
        $registerUsers->bindValue(':lastName', $users->getLastName(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':firstName', $users->getFirstName(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':pseudo', $users->getPseudo(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':email', $users->getEmail(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':password', $users->getPassword(), \PDO::PARAM_STR);
        $registerUsers->bindValue(':creation_date', $users->getCreationDate(), \PDO::PARAM_STR);

        $registerUsers->execute();
        /*$registerUsers->execute(array(
         'lastname' => $lastname,
         'firstname' => $firstname,
         'pseudo' => $pseudo,
         'email' => $email,
         'password' => $password
         ));*/
    }

    public function connected($pseudo)
    {
        $db = $this->dbConnect();
        $connected = $db->prepare('SELECT idUsers, role, password FROM users 
   WHERE pseudo = :pseudo');
        $connected->execute(array(
        'pseudo' => $pseudo
        ));
        return $connected->fetch();
    }
}
