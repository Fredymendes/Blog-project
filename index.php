<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    else if($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            echo 'Erreur : aucune informations identifié';
        }
    }
    elseif ($_GET['action'] == 'about') {
        showAbout();
    } else if ($_GET['action'] == 'register') {
        showRegister();
    } else if ($_GET['action'] == 'connect') {
        showConnect();
    } else if ($_GET['action'] == 'profil') {
        adminConnect();
    } else if ($_GET['action'] == 'forms') {
        formConnect();
    } else if ($_GET['action'] == 'article') {
        showArticle();
    } else if ($_GET['action'] == 'updateId') {
        showUpdatePost($_GET['id']);
    } else if ($_GET['action'] == 'updateValid') {
        updatePost($_GET['id'], $_POST['title'], $_POST['wording'], $_POST['content']);
    } else if ($_GET['action'] == 'deleteId') {
        showDeletePost($_GET['id']);
    } else if ($_GET['action'] == 'deleteValid') {
        deletePost($_GET['id']);
    } else if ($_GET['action'] == 'commentValid') {
        addComment($_GET['id'], $_POST['comment']);
    } else if ($_GET['action'] == 'registerValid') {
        addRegister($_POST['lastname'], $_POST['firstname'],
         $_POST['pseudo'], $_POST['email'], $_POST['password']);
    } else if ($_GET['action'] == 'connectValid') {
        addConnect($_POST['pseudo']);
    } else if ($_GET['action'] == 'formValid') {
        addForm($_POST['lastname'], $_POST['firstname'], 
        $_POST['typeDemande'], $_POST['email'], $_POST['message']);
    } else if ($_GET['action'] == 'contentValid') {
        addContent($_POST['title'], $_POST['wording'], $_POST['content']);
    } else if ($_GET['action'] == 'deconnexion') {
        session_start();
        session_destroy();
        header('location: index.php');
        exit;
    }
} else {
    listPosts();
}
//faire une page erreur
//revoir le projet
//faire des commentaires sur chaque élément
//terminé le design