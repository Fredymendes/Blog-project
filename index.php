<?php

session_start();
use App\Autoloader;
use App\Controller\BackendController;
use App\Controller\FrontendController;

require_once 'libraries/Autoloader.php';
Autoloader::register();


$backend = new BackendController();
$frontend = new FrontendController();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        $frontend->listPosts();
    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $frontend->post();
        } else {
            echo 'Erreur : aucune informations identifié';
        }
    } elseif ($_GET['action'] == 'about') {
        $backend->showAbout();
    } elseif ($_GET['action'] == 'register') {
        $backend->showRegister();
    } elseif ($_GET['action'] == 'connect') {
        $backend->showConnect();
    } elseif ($_GET['action'] == 'profil') {
        $backend->adminConnect();
    } elseif ($_GET['action'] == 'forms') {
        $backend->formConnect();
    } elseif ($_GET['action'] == 'article') {
        $backend->showArticle();
    } elseif ($_GET['action'] == 'updateId') {
        $backend->showUpdatePost($_GET['id']);
    } elseif ($_GET['action'] == 'updateValid') {
        $backend->updatePost($_GET['id'], $_POST['title'], $_POST['wording'], $_POST['content']);
    } elseif ($_GET['action'] == 'deleteId') {
        $backend->showDeletePost($_GET['id']);
    } elseif ($_GET['action'] == 'deleteValid') {
        $backend->deletePost($_GET['id']);
    } elseif ($_GET['action'] == 'commentValid') {
        $frontend->addComment($_GET['id'], $_POST['comment']);
    } elseif ($_GET['action'] == 'registerValid') {
        $backend->addRegister(
            $_POST['lastname'],
            $_POST['firstname'],
            $_POST['pseudo'],
            $_POST['email'],
            $_POST['password']
        );
    } elseif ($_GET['action'] == 'connectValid') {
        $backend->addConnect($_POST['pseudo']);
    } elseif ($_GET['action'] == 'formValid') {
        $backend->addForm(
            $_POST['lastname'],
            $_POST['firstname'],
            $_POST['typeDemande'],
            $_POST['email'],
            $_POST['message']
        );
    } elseif ($_GET['action'] == 'contentValid') {
        $backend->addContent($_POST['title'], $_POST['wording'], $_POST['content']);
    } elseif ($_GET['action'] == 'deconnexion') {
        session_start();
        session_destroy();
        header('location: index.php');
        exit;
    }
} else {
    $frontend->listPosts();
}
