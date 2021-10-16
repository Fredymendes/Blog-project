<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            echo 'Erreur : aucun article identifié';
        }
    }
    else if ($_GET['action'] == 'register') {
        showRegister();
    } else if ($_GET['action'] == 'connect') {
        showConnect();
    } else if ($_GET['action'] == 'profil') {
        adminConnect();
    } else if ($_GET['action'] == 'registerValid') {
        addRegister($_POST['lastname'], $_POST['firstname'],
         $_POST['pseudo'], $_POST['email'], $_POST['password']);
    } else if ($_GET['action'] == 'connectValid') {
        addConnect($_POST['pseudo']);
    } else {

    }
} else {
    listPosts();
}