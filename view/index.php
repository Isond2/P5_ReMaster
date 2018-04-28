<?php
require('../controller/Controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    } elseif ($_GET['action'] == 'home') {
        home();
    } elseif ($_GET['action'] == 'addPost') {
        addPost();
    } elseif ($_GET['action'] == 'addNewPost') {
        if (isset($_POST['title'], $_POST['content'], $_POST['chapo'], $_POST['author'])) {
                addNewPost($_POST['title'], $_POST['content'], $_POST['chapo'], $_POST['author']);
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    } elseif ($_GET['action'] == 'edit') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            edit();
        }
    } elseif ($_GET['action'] == 'delete') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            delete();
        }
    } elseif ($_GET['action'] == 'deleteAction') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            deleteAction($_GET['id']);
        }
    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            } else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } elseif ($_GET['action'] == 'editAction') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['content'])) {
                addEditPost($_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['author'], $_GET['id']);
            } else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
} else {
    listPosts();
}
