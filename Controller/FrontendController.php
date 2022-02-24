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

        require('view/blog/listPostsView.php');
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $listComments = $commentManager->getComments($_GET['id']);
        
        require('view/blog/postView.php');
    }

    public function showComment()
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->getWaitingComments();

        require('view/users/commentView.php');
    }

    public function postComment($idPosts, $postComment)
    {
        $commentManager = new CommentManager();
        if (!isset($_POST['idPosts']) and !isset($_POST['comment'])) {
            echo'Le commentaire est invalide.';
            return;
        }

        if (!isset($_SESSION['idUsers'])) {
            echo 'Vous devez être authentifié pour soumettre un commentaire.';
            return;
        } else {
            $postComment = new Comment([
                'idUsers' => $_SESSION['idUsers'],
                'idPosts' => $idPosts,
                'comment' => $_POST['comment']]);
            $comment = $commentManager->addComment($postComment);
            header('Location: index.php?action=post&id=' . $idPosts);
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
