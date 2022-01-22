<?php

namespace App\Controller;

use App\model\UsersManager;
use App\model\FormsManager;
use App\model\PostManager;
use App\model\Users;
use App\model\Forms;
use App\model\Post;

class BackendController
{
    //Fonction qui permet la visibilité des views
    public function showAbout()
    {
        require('view/blog/aboutView.php');
    }
    public function showRegister()
    {
        require('view/admin/registerView.php');
    }

    public function showConnect()
    {
        require('view/admin/connexionView.php');
    }

    public function adminConnect()
    {
        require('view/admin/profilView.php');
    }

    public function formConnect()
    {
        require('view/admin/formView.php');
    }

    // Fonction qui appelle les models
    public function showArticle()
    {
        $postManager = new PostManager();
        $postManager->getPosts();
        require('view/users/articleView.php');
    }

    public function showUpdatePost($updatePost)
    {
        $postManager = new PostManager();
        $updatePost = $postManager->getPost($updatePost);
        require('view/users/editPostView.php');
    }

    public function updatePost($postData)//$id, $title, $wording, $content
    {
        $postManager = new PostManager();
        if (!isset($_POST['title']) or !isset($_POST['wording']) or !isset($_POST['content'])) {
            echo "Oups le post n'est pas passée...";
            return;
        } else {
            $postData = new Post([
                'idUsers' => $_SESSION['idUsers'],
                'title' => $_POST['title'],
                'wording' => $_POST['wording'],
                'content' => $_POST['content']
            ]);
            $postManager->updatePost($postData);
            header("Location: index.php?action=article");
            echo 'Post envoyé';
        }
    }

    public function showDeletePost($id)
    {
        $postManager = new PostManager();
        $delete = $postManager->deletePost($id);
        require('view/users/deletePostView.php');
    }

    public function deletePost($id)
    {
        $postManager = new PostManager();
        if (!isset($_GET['id'])) {
            echo "Oups le post est absent...";
            return;
        } else {
            $update = $postManager->deletePost($id);
            header("Location: index.php?action=article");
            echo 'Suppression éffectué';
        }
    }

    public function addRegister($users)//$lastname, $firstname, $pseudo, $email, $password
    {
        $usersManager = new UsersManager();

        if (isset($_POST['submit'])) {
            if (
                empty($_POST['lastname']) or empty($_POST['firstname'])
                or empty($_POST['pseudo']) or empty($_POST['email'])
                or empty($_POST['password'])
            ) {
                echo "Vous n'avez pas remplit tous les champs...";
            } else {
                $users = new Users([
                'lastname' => $_POST['lastname'],
                'firstname' => $_POST['firstname'],
                'pseudo' => $_POST['pseudo'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
                ]);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $usersManager->register($users);
                echo "Inscription réussi !";
            }
        }
        require('view/admin/registerView.php');
    }

    public function addConnect($pseudo)
    {
        if (isset($_POST['submit'])) {
            $usersManager = new UsersManager();
            $resultat = $usersManager->connected($pseudo);
            $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

            if (!$isPasswordCorrect) {
                echo 'Mauvais identifiant ou mot de passe !';
            } else {
                $_SESSION['idUsers'] = $resultat['idUsers'];
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['role'] = $resultat['role'];
                if ($resultat['role'] == 1) {
                    header("Location: index.php?action=profil");
                } else {
                    header("Location: index.php");
                }
            }
        }
        require('view/admin/connexionView.php');
    }

    public function addContent($postData)//$title, $wording, $content
    {
        $contentPost = new PostManager();

        if (isset($_POST['submit'])) {
            if (empty($_POST['title']) or empty($_POST['wording']) or empty($_POST['content'])) {
                echo "Oups le post n'est pas passée...";
            } elseif ($_SESSION['idusers'] == 1) {
                $postData = new Post([
                    'idUsers' => $_SESSION['idUsers'],
                    'title' => $_POST['title'],
                    'wording' => $_POST['wording'],
                    'content' => $_POST['content']
                ]);
                $post = $contentPost->addPost($postData);
                header("Location: index.php");
                echo 'Post envoyé';
            } else {
                header('Location: index.php');
            }
        }
        require('view/admin/profilView.php');
    }

    public function addForm($form)
    {
        $contactForm = new FormsManager();

        if (isset($_POST['submit'])) {
            if (
                empty($_POST['lastname']) or empty($_POST['firstname'])
                or empty($_POST['typeDemande']) or empty($_POST['email']) or empty($_POST['message'])
            ) {
                echo "Veuillez remplir tous les champs...";
            } else {
                $form = new Forms([
                    'lastname' => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'typeDemande' => $_POST['typeDemande'],
                    'email' => $_POST['email'],
                    'message' => $_POST['message']
                ]);
                $contactForm->registerForm($form);
                $to = $form->getEmail();
                $subject = $form->getTypeDemande();
                $message = $form->getMessage();
                $headers = array(
                'From' => 'fredymendes6@gmail.com',
                'Reply-To' => 'fredymendes6@gmail.com',
                'X-Mailer' => 'PHP/' . phpversion()
                );
                mail($to, $subject, $message, $headers);
                $_SESSION['message'] = 'Message envoyé';
            }
        }
        require('view/admin/formView.php');
    }
}
