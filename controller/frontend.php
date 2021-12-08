<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UsersManager.php');



function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts(); 

    require('view/blog/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/blog/postView.php');
}

function addComment($postId, $comment)
{
    $commentManager = new CommentManager();
    if (!isset($_POST['comment']) AND
        !isset($_POST['idPosts'])
        )
    {
        echo('Le commentaire est invalide.');
        return;
    }
    
    if (!isset($_SESSION['idUsers'])) {
        echo('Vous devez être authentifié pour soumettre un commentaire');
        return;
    } else {
        $comment = $commentManager->postComment($postId, $comment);
        header('Location: index.php?action=post&id=' .$postId);
    }
}
