<?php
require_once('model/UsersManager.php');
require_once('model/FormsManager.php');
require_once('model/PostManager.php');

function showAbout()
{
    require('view/blog/aboutView.php');
}
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

function formConnect()
{
    require('view/admin/formView.php');
}

function showArticle()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts(); 
    require('view/users/articleView.php');
}

function showUpdatePost($id)
{
    $postManager = new PostManager();
    $post = $postManager->getPost($id);
    require('view/users/editPostView.php');
}

function updatePost($id, $title, $wording, $content)
{
    $postManager = new PostManager();
    if(!isset($_POST['title']) 
        OR !isset($_POST['wording']) 
        OR !isset($_POST['content']))
        {
            echo "Oups le post n'est pas passée...";
            return;
        } else {
            $update = $postManager->updatePost($id, $title, $wording, $content);
            header("Location: index.php?action=article");
            echo 'Post envoyé';
        }
}

function showDeletePost($id)
{
    $postManager = new PostManager();
    $delete = $postManager->deletePost($id);
    require('view/users/deletePostView.php');
}

function deletePost($id)
{
    $postManager = new PostManager();
    if(!isset($_GET['id']))
        {
            echo "Oups le post est absent...";
            return;
        } else {
            $update = $postManager->deletePost($id);
            header("Location: index.php?action=article");
            echo 'Suppression éffectué';
        }
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
    } else {
        $_SESSION['idUsers'] = $resultat['idUsers'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['role'] = $resultat['role'];
        if ($resultat['role'] == 1)
        {
            header("Location: index.php?action=profil");
        } else {
            header("Location: index.php");
        }
        
    }
}
    require('view/admin/connexionView.php');
}

function addContent($title, $wording, $content)
{
    $contentPost = new PostManager;
  
    if (isset($_POST['submit']))
    {
        if(empty($_POST['title']) 
        OR empty($_POST['wording']) 
        OR empty($_POST['content']))
        { 
            echo "Oups le post n'est pas passée...";
        } else if ($_SESSION['idusers'] == 1) {
            $post = $contentPost->getContent($title, $wording, $content);
            header("Location: index.php");
            echo 'Post envoyé';
            //faire une condition afin de proteger l'espace membre
        } else {
            header('Location: index.php');
        }
    }
    require('view/admin/profilView.php');
}

function addForm($lastname, $firstname, $typeDemande, $email, $message)
{
    $contactForm = new FormManager();
   
    if(isset($_POST['submit']))
{
    if(empty($_POST['lastname']) OR empty($_POST['firstname']) 
    OR empty($_POST['typeDemande']) OR empty($_POST['email']) 
    OR empty($_POST['message']))
    {
        echo "Veuillez remplir tous les champs...";
    } else {
        $formsManager = $contactForm->registerForm($lastname, $firstname, 
        $typeDemande, $email, $message);
        $to = $email;
        $subject = $typeDemande;
        $message = $message;
        $headers = array(
            'From' => 'fredymendes6@gmail.com',
            'Reply-To' => 'fredymendes6@gmail.com',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        mail($to, $subject, $message, $headers);
        /*Envoyé un mail au webmaster*/
        echo "Message envoyé !";
    }
}
    require('view/admin/formView.php');
}