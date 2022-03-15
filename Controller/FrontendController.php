<?php

namespace App\Controller;

use App\model\PostManager;
use App\model\CommentManager;
use App\model\Post;
use App\model\Comment;

class FrontendController
{
    public function listPosts()
    {
        $pdoManager = new PostManager();
        $listPosts = new Post();
        $listPosts = $pdoManager->getPosts($listPosts);
        if ($listPosts === false) {
            $_SESSION['warning_message'] = 'Désolé..nous n\'avons trouvé l\'article en question';
            header('Location: index.php');
        }
        include 'view/blog/listPostsView.php';
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        if ($post === false) {
            $_SESSION['warning_message'] = 'Erreur..cette article n\'existe pas';
            header('Location: index.php');
        }
        $listComments = $commentManager->getComments($_GET['id']);

        include 'view/blog/postView.php';
    }

    public function showComment()
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->getWaitingComments();
        if ($comments === false) {
            $_SESSION['warning_message'] = 'Ce commentaire n\'existe pas !';
        }
        include 'view/users/commentView.php';
    }

    public function postComment($idPosts, $postComment)
    {
        $commentManager = new CommentManager();
        if (isset($_POST['submit'])) {
            if (
                empty($_POST['comment'])
            ) {
                $_SESSION['warning_message'] = 'Veuillez ecrire un commentaire';
                header('Location: index.php?action=post&id=' . $idPosts);
            } elseif (!isset($_POST['idPosts']) and !isset($_POST['comment'])) {
                    $_SESSION['warning_message'] = 'Le commentaire ne peut être publié.';
            } elseif (isset($_SESSION['idUsers'])) {
                $postComment = new Comment(
                    [
                    'idUsers' => $_SESSION['idUsers'],
                    'idPosts' => $idPosts,
                    'comment' => $_POST['comment']]
                );
                $_SESSION['message'] = 'Votre message sera publier dans quelque instant !';
                $comment = $commentManager->addComment($postComment);
                header('Location: index.php?action=post&id=' . $idPosts);
            }
        }
    }

    public function validateComment()
    {
        $commentManager = new CommentManager();
        $commentManager->validateComments($_GET['id']);
        if ($commentManager === false) {
            $_SESSION['warning_message'] = 'Erreur..ce commentaire n\'existe pas';
            header("Location: index.php?action=comment");
        }
        $_SESSION['message'] = 'Ce message à était accepté !';
        header('Location: index.php?action=comment');
    }

    public function deleteComment()
    {
        $commentManager = new CommentManager();
        $commentManager->deleteComments($_GET['id']);
        $_SESSION['warning_message'] = 'Ce message est supprimer !';
        header('Location: index.php?action=comment');
    }
}
