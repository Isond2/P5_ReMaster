<?php

require_once('../model/UserManager.php');

function addUser()
{
    require('../view/frontend/user/addUser.php');

    if (isset($_POST['nickname'], $_POST['password'], $_POST['email'])) {
        $userManager = new UserManager();
        $req = $userManager->addNewUser($_POST['nickname'], $_POST['password'], $_POST['email']);
        header('Location: index.php?action=listPosts');

        if ($req === false) {
            throw new Exception('Impossible d\'ajouter l\' utilisateur !');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }
}


function login()
{
    require('../view/frontend/user/login.php');

    if (isset($_POST['nickname'], $_POST['password'])) {
        $userManager = new UserManager();
        $userManager->logUser($_POST['nickname'], $_POST['password']);
    }
}

function disconnection()
{
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: index.php?action=listPosts');
}
