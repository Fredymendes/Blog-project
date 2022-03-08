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

        include 'view/blog/listPostsView.php';
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        if ($post == false) {
            $_SESSION['message'] = 'Erreur..ce post n\'existe pas';
            header('Location: index.php');
        }
        $listComments = $commentManager->getComments($_GET['id']);

        include 'view/blog/postView.php';
    }

    public function showComment()
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->getWaitingComments();

        include 'view/users/commentView.php';
    }

    public function postComment($idPosts, $postComment)
    {
        $commentManager = new CommentManager();
        if (!isset($_POST['idPosts']) and !isset($_POST['comment'])) {
            echo'Le commentaire est invalide.';
            return;
        }

        if (isset($_SESSION['idUsers'])) {
            $postComment = new Comment(
                [
                'idUsers' => $_SESSION['idUsers'],
                'idPosts' => $idPosts,
                'comment' => $_POST['comment']]
            );
            $comment = $commentManager->addComment($postComment);
            header('Location: index.php?action=post&id=' . $idPosts);
            $_SESSION['message'] = '<script>alert(\'Votre message sera publier dans quelque instant !\')</script>';
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        }
    }

    public function updateComment()
    {
        $commentManager = new CommentManager();
        $commentManager->validateComments($_GET['id']);
        header('Location: index.php?action=comment');
    }

    public function deleteComment()
    {
        $commentManager = new CommentManager();
        $commentManager->deleteComments($_GET['id']);
        header('Location: index.php?action=comment');
    }
}
