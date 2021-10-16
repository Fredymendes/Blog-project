<?php
require_once("model/Manager.php");

class UsersManager extends Manager
{
   function register($lastname, $firstname, $pseudo, $email, $password){
     $db = $this->dbConnect(); 
     $registerUsers = $db->prepare('INSERT INTO 
     users(lastname, firstname, pseudo, email, password, 
     creation_date) 
     VALUES(:lastname, :firstname, :pseudo, :email, :password, NOW())');
     $registerUsers->execute(array(
         'lastname' => $lastname,
         'firstname' => $firstname,
         'pseudo' => $pseudo,
         'email' => $email,
         'password' => $password
     ));
   }

   function connected($pseudo)
   {
   $db = $this->dbConnect();  
   $connected = $db->prepare('SELECT idUsers, password FROM users 
   WHERE pseudo = :pseudo');
   $connected->execute(array(
      'pseudo' => $pseudo
   ));
   return $connected->fetch();
}
   
}
   


