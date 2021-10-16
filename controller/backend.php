<?php
require_once('model/UsersManager.php');

function showRegister()
{
    require('view/admin/registerView.php');
}

function showConnect()
{
    require('view/admin/connexionView.php');
}

function adminConnect()
{
    require('view/admin/profilView.php');
}


function addRegister($lastname, $firstname, $pseudo, $email, $password)
{
    $usersManager = new UsersManager();
    
    if(isset($_POST['submit']))
{
    if(empty($_POST['lastname']) OR empty($_POST['firstname']) 
    OR empty($_POST['pseudo']) OR empty($_POST['email']) 
    OR empty($_POST['password']))
    {
        echo "Vous n'avez pas remplit tous les champs...";
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $registerUsers = $usersManager->register($lastname, $firstname, $pseudo, $email, $password);
        echo "Inscription réussi !";
    }
}
    require('view/admin/registerView.php');
}

function addConnect($pseudo)
{     
    if(isset($_POST['submit']))
{   
    $usersManager = new UsersManager();
    $resultat = $usersManager->connected($pseudo);
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
    
    if (!$isPasswordCorrect)
{
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else {
        session_start();
        $_SESSION['idUsers'] = $resultat['idUsers'];
        $_SESSION['pseudo'] = $pseudo;
        header("Location: index.php?action=profil");
    }
}
    require('view/admin/connexionView.php');
}