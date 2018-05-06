<?php
	require('../controller/PostController.php');
	require('../controller/CommentController.php');
	require('../controller/UserController.php');
/**
*
*/
class Routeur
{
	private $postController;

	private $commentController;

	private $userController;

	function __construct() {
		$this -> postController= new PostController();
		$this -> commentController= new CommentController();
		$this -> userController= new UserController();

	}

	function routeRequest() {
	if (isset($_GET['action'])) {
	    if ($_GET['action'] == 'listPosts') {
	        $this->postController->listPosts();
	    } elseif ($_GET['action'] == 'home') {
	        $this->postController->home();
	    } elseif ($_GET['action'] == 'addPost') {
	        $this->postController->addPost();
	    } elseif ($_GET['action'] == 'edit') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            $this->postController->edit();
	        }
	    } elseif ($_GET['action'] == 'delete') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            $this->postController->delete($_GET['id']);
	        }
	    } elseif ($_GET['action'] == 'post') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            $this->postController->post();
	        } else {
	            echo 'Erreur : aucun identifiant de billet envoyé';
	        }
	    } elseif ($_GET['action'] == 'addComment') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
	                $this->commentController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
	            } else {
	                echo 'Erreur : tous les champs ne sont pas remplis !';
	            }
	        } else {
	            echo 'Erreur : aucun identifiant de billet envoyé';
	        }
	    } elseif ($_GET['action'] == 'addUser') {
	        $this->userController->addUser();
	    } elseif ($_GET['action'] == 'login') {
	        $this->userController->login();
	    } elseif ($_GET['action'] == 'disconnection') {
	        $this->userController->disconnection();
	    } elseif ($_GET['action'] == 'commentTrue') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            $this->commentController->commentTrue($_GET['id']);
	        } else {
	            echo 'Erreur : aucun identifiant de billet envoyé';
	        }
	    } elseif ($_GET['action'] == 'commentFalse') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            $this->commentController->commentFalse($_GET['id']);
	        } else {
	            echo 'Erreur : aucun identifiant de billet envoyé';
	        }
	    }
	} else {
	    $this->postController->listPosts();
	}
	}
}

?>