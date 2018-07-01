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
            $nickname = $this->test_input($_POST['nickname']);
            $password = $this->test_input($_POST['password']);
            $email = $this->test_input($_POST['email']);

            $req = $this->userManager->addNewUser($nickname, $password, $email);
            header('Location: index.php?action=listPosts');

            if ($req === false) {
                throw new Exception('Impossible d\'ajouter l\' utilisateur !');
            }
        }
        require('../view/frontend/user/addUser.php');
    }


    function login()
    {
        require('../view/frontend/user/login.php');

        if (isset($_POST['nickname'], $_POST['password'])) {

            $nickname = $this->test_input($_POST['nickname']);
            $password = $this->test_input($_POST['password']);

            $this->userManager->logUser($nickname, $password);
        }
    }

    function disconnection()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: index.php?action=listPosts');
    }

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities(strip_tags($data));
        return $data;
    }
}
