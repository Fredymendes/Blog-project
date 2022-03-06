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
        require('view/blog/aboutView.php');
    }

    public function showDeleteValid($deletePost)
    {
        $postManager = new PostManager();
        $delete = $postManager->getPost($deletePost);
        require('view/users/deletePostView.php');
    }

    public function deletePost()
    {
        $postManager = new PostManager();
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = '<script>alert(\'Le post est absent...\')</script>';
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            return;
        } else {
            $postManager->deletePost($_GET['id']);
            header("Location: index.php?action=article");
            $_SESSION['message'] = '<script>alert(\'Le post est supprimé...\')</script>';
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        }
    }

    public function showArticle()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        require('view/users/articleView.php');
    }

    public function showUpdatePost($updatePost)
    {
        $postManager = new PostManager();
        $update = $postManager->getPost($updatePost);
        require('view/users/editPostView.php');
    }

    public function updatePost($updatePost)
    {
        $postManager = new PostManager();
        if (!isset($_POST['title']) or !isset($_POST['wording']) or !isset($_POST['content'])) {
            $_SESSION['message'] = '<script>alert(\'Ooops le post n\'est pas passé...\')</script>';
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        } else {
            $updatePost = new Post([
                'title' => $_POST['title'],
                'wording' => $_POST['wording'],
                'content' => $_POST['content'],
                'idPosts' => $_GET['id']
            ]);
            $update = $postManager->updatePost($updatePost);
            header("Location: index.php?action=article");
            echo "Post envoyé";
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
                $_SESSION['message'] = '<script>alert(\'Veuillez remplir tous les champs...\')</script>';
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            } else {
                $users = new Users([
                'lastname' => $_POST['lastname'],
                'firstname' => $_POST['firstname'],
                'pseudo' => $_POST['pseudo'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]);
                $usersManager->register($users);
                $_SESSION['message'] = '<script>alert(\'Inscription réussi !\')</script>';
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
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
                $_SESSION['message'] = '<script>alert(\'Mauvais mot de passe, veuillez recommencez\')</script>';
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
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

    public function addContent($postData)
    {
        $contentPost = new PostManager();

        if (isset($_POST['submit'])) {
            if (empty($_POST['title']) or empty($_POST['wording']) or empty($_POST['content'])) {
                $_SESSION['message'] = '<script>alert(\'Ooops le post n\'est pas passé...\')</script>';
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            } elseif (isset($_SESSION['idUsers'])) {
                $postData = new Post([
                    'idUsers' => $_SESSION['idUsers'],
                    'title' => $_POST['title'],
                    'wording' => $_POST['wording'],
                    'content' => $_POST['content']
                ]);
                $post = $contentPost->addPost($postData);
                }
                header("Location: index.php");
                $_SESSION['message'] = '<script>alert(\'Post envoyé!\')</script>';
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
            }
        }
        require('view/admin/profilView.php');
    }

    public function addForm($form)
    {
        $contactForm = new FormsManager();

        if (isset($_POST['submit'])) {
            if (empty($_POST['lastname']) or empty($_POST['firstname'])
                or empty($_POST['object']) or empty($_POST['email'])
                or empty($_POST['message'])) {
                $_SESSION['message'] = '<script>alert(\'Veuillez remplir tous les champs...\')</script>';
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            } else {
                $form = new Forms([
                    'lastname' => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'object' => $_POST['object'],
                    'email' => $_POST['email'],
                    'message' => $_POST['message']
                ]);
                $contactForm->registerForm($form);
                $to = $form->getEmail();
                $subject = $form->getObject();
                $message = $form->getMessage();
                $headers = array(
                'From' => 'fredymendes6@gmail.com',
                'Reply-To' => 'fredymendes6@gmail.com',
                'X-Mailer' => 'PHP/' . phpversion()
                );
                mail($to, $subject, $message, $headers);
                $_SESSION['message'] = '<script>alert(\'Merçi pour votre message et à bientôt\')</script>';
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            }
        }
        require('view/blog/aboutView.php');
    }
}

