<?php
require('../controller/PostController.php');
require('../controller/CommentController.php');
require('../controller/UserController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    } elseif ($_GET['action'] == 'home') {
        home();
    } elseif ($_GET['action'] == 'addPost') {
        addPost();
    } elseif ($_GET['action'] == 'edit') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            edit();
        }
    } elseif ($_GET['action'] == 'delete') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            delete($_GET['id']);
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
    } elseif ($_GET['action'] == 'addUser') {
        addUser();
    } elseif ($_GET['action'] == 'login') {
        login();
    } elseif ($_GET['action'] == 'disconnection') {
        disconnection();
    } elseif ($_GET['action'] == 'commentTrue') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            commentTrue($_GET['id']);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } elseif ($_GET['action'] == 'commentFalse') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            commentFalse($_GET['id']);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
} else {
    listPosts();
}
