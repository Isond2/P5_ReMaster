<?php

require_once('../model/UserManager.php');

class UserController
{
    private $userManager;

    function __construct() {
        $this->userManager= new UserManager();
    }
    function addUser()
    {


        if (isset($_POST['nickname'], $_POST['password'], $_POST['email'])) {
            $req = $this->userManager->addNewUser($_POST['nickname'], $_POST['password'], $_POST['email']);
            header('Location: index.php?action=listPosts');

            if ($req === false) {
                throw new Exception('Impossible d\'ajouter l\' utilisateur !');
            } else {
            }
        }
        require('../view/frontend/user/addUser.php');
    }


    function login()
    {
        require('../view/frontend/user/login.php');

        if (isset($_POST['nickname'], $_POST['password'])) {
            $this->userManager->logUser($_POST['nickname'], $_POST['password']);
        }
    }

    function disconnection()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: index.php?action=listPosts');
    }
}