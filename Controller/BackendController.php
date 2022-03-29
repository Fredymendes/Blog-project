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
    public function showAbout()
    {
        include 'view/blog/aboutView.php';
    }

    public function showRegister()
    {
        include 'view/admin/registerView.php';
    }

    public function showConnect()
    {
        include 'view/admin/connexionView.php';
    }

    public function adminConnect()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            include 'view/admin/profilView.php';
        } else {
            $_SESSION['warning_message'] = 'NON !!!';
            header("location: index.php");
            exit;
        }
    }

    public function formConnect()
    {
        include 'view/blog/aboutView.php';
    }

    public function showDeleteValid($deletePost)
    {
        $postManager = new PostManager();
        $delete = $postManager->getPost($deletePost);
        if ($deletePost === false) {
            $_SESSION['warning_message'] = 'L\'article que voulez supprimer n\'existe pas !';
            header('Location: index.php?action=article');
        }
        include 'view/users/deletePostView.php';
    }

    public function deletePost()
    {
        $postManager = new PostManager();
        if (!isset($_GET['id'])) {
            $_SESSION['warning_message'] = 'Le post est absent...';
        } else {
            $_SESSION['warning_message'] = 'Le post est supprimé...';
            $postManager->deletePost($_GET['id']);
            header("Location: index.php?action=article");
            exit;
        }
    }

    public function showArticle()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        if ($posts === false) {
            $_SESSION['warning_message'] = 'il n\'y a aucun article';
            header('Location: index.php?action=article');
        }
        include 'view/users/articleView.php';
    }

    public function showUpdatePost($updatePost)
    {
        $postManager = new PostManager();
        $update = $postManager->getPost($updatePost);
        if ($update === false) {
            $_SESSION['warning_message'] = 'Cette article n\'existe pas !';
            header('Location: index.php?action=article');
            exit;
        } elseif (isset($_SESSION['role']) === 0) {
            $_SESSION['warning_message'] = 'Mais! vous n\'êtes pas autorisez d\'etre ici !!!';
            header("Location: index.php");
            exit;
        }
        include 'view/users/editPostView.php';
    }

    public function updatePost($updatePost)
    {
        $postManager = new PostManager();
        if (!isset($_POST['title']) or !isset($_POST['wording']) or !isset($_POST['content'])) {
            $_SESSION['warning_message'] = 'Il semble que le post est un problème';
            header("Location: index.php?action=article");
            exit;
        } else {
            $updatePost = new Post(
                [
                'title' => $_POST['title'],
                'wording' => $_POST['wording'],
                'content' => $_POST['content'],
                'idPosts' => $_GET['id']
                ]
            );
            $_SESSION['message'] = 'Le post à été mise à jour !';
            $update = $postManager->updatePost($updatePost);
            header("Location: index.php?action=article");
            exit;
        }
    }

    public function addRegister($users)
    {
        $usersManager = new UsersManager();
        if (isset($_POST['submit'])) {
            if (
                empty($_POST['lastname']) or empty($_POST['firstname']) or empty($_POST['pseudo'])
                or empty($_POST['email']) or empty($_POST['password'])
            ) {
                $_SESSION['warning_message'] = 'Veuillez remplir tous les champs...';
            } else {
                $users = new Users(
                    [
                    'lastname' => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'pseudo' => $_POST['pseudo'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                    ]
                );
                $_SESSION['message'] = 'Inscription réussi !';
                $usersManager->register($users);
            }
        }
        include 'view/admin/registerView.php';
    }

    public function connProfil($pseudo)
    {
        $usersManager = new UsersManager();

        if (isset($_POST['submit'])) {
            $resultat = $usersManager->connected($pseudo);
            $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

            if (!$isPasswordCorrect) {
                $_SESSION['warning_message'] = 'Mauvais mot de passe, veuillez recommencez';
                header("Location: index.php?action=connect");
                exit;
            } else {
                $_SESSION['idUsers'] = $resultat['idUsers'];
                $_SESSION['pseudo'] = $resultat['pseudo'];
                $_SESSION['role'] = $resultat['role'];
                if ($resultat['role'] === 1) {
                    $_SESSION['message'] = 'Bienvenue Patron !';
                    header("Location: index.php?action=profil");
                    exit;
                } elseif ($resultat['role'] === 0) {
                    $_SESSION['message'] = 'Bienvenue Printer !';
                    header("Location: index.php");
                    exit;
                }
            }
        }
        include 'view/admin/connexionView.php';
    }

    public function addContent($postData)
    {
        $postManager = new PostManager();

        if (isset($_POST['submit'])) {
            if (empty($_POST['title']) or empty($_POST['wording']) or empty($_POST['content'])) {
                $_SESSION['warning_message'] = 'Ooops le post n\'est pas passé...';
                header("Location: index.php?action=profil");
            } elseif (isset($_SESSION['idUsers'])) {
                $postData = new Post(
                    [
                        'idUsers' => $_SESSION['idUsers'],
                        'title' => $_POST['title'],
                        'wording' => $_POST['wording'],
                        'content' => $_POST['content']
                        ]
                );
                $post = $postManager->addPost($postData);
                $_SESSION['message'] = 'Post envoyé!';
                header("Location: index.php?action=profil");
            }
        }
        include 'view/admin/profilView.php';
    }

    public function addForm($form)
    {
        $contactForm = new FormsManager();
        if (isset($_POST['submit'])) {
            if (
                empty($_POST['lastname']) or empty($_POST['firstname'])
                or empty($_POST['object']) or empty($_POST['email'])
                or empty($_POST['message'])
            ) {
                $_SESSION['warning_message'] = 'Veuillez remplir tous les champs...';
                header("Location: index.php");
            } else {
                $form = new Forms(
                    [
                    'lastname' => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'object' => $_POST['object'],
                    'email' => $_POST['email'],
                    'message' => $_POST['message']
                    ]
                );
                $contactForm->registerForm($form);
                $to = $form->getEmail();
                $subject = $form->getObject();
                $message = $form->getMessage();
                $headers = array(
                'From' => 'fredymendes6@gmail.com',
                'Reply-To' => 'fredymendes6@gmail.com',
                'X-Mailer' => 'PHP/' . phpversion()
                );
                $_SESSION['message'] = 'Merçi pour votre message et à bientôt';
                mail($to, $subject, $message, $headers);
            }
        } else {
            include 'view/blog/aboutView.php';
        }
    }
}
