<?php

namespace App\Controller;

use App\model\{PostManager, CommentManager};
use App\model\{Post, Comment};

class FrontendController
{
    public function listPosts()
    {
        $postManager = new PostManager();
        $postManager->getPosts();

        require('view/blog/listPostsView.php');
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $postManager->getPost($_GET['id']);
        $commentManager->getComments($_GET['id']);

        require('view/blog/postView.php');
    }

    public function addComment($postId, $comment)
    {
        $commentManager = new CommentManager();
        if (!isset($_POST['comment']) and !isset($_POST['idPosts'])) {
            echo 'Le commentaire est invalide.';
            return;
        }

        if (!isset($_SESSION['idUsers'])) {
            echo 'Vous devez être authentifié pour soumettre un commentaire.';
            return;
        } else {
            $comment = new Comment([
                'postId' => $postId,
                'comment' => $_POST['comment']
            ]);
            $commentManager->postComment($comment);
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
}
