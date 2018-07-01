<?php

require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');

/**
*
*/
class PostController
{
    public $postManager;

    private $commentManager;

    function __construct() {

        $this->postManager= new PostManager();
        $this->commentManager= new CommentManager();
    }
    function home()
    {
        require('../view/frontend/home.php');
    }


    function listPosts()
    {
        $posts = $this->postManager->getPosts();

        require('../view/frontend/post/listPostsView.php');
    }

    function post()
    {
        $id = $_GET['id'];

        $post = $this->postManager->getPost($id);
        $comments = $this->commentManager->getComments($id);
        $approuvedComments = $this->commentManager->getApprouvedComments($id);

        if(empty($post)){
        	header('Location: index.php?action=listPosts');
        }

        require('../view/frontend/post/postView.php');
    }


    function edit()
    {
        session_start();
        if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true)
        {

            $post = $this->postManager->getPost($_GET['id']);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
			    if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
	    			if ($_SESSION['token'] == $_POST['token']) {
			            if (isset($_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['author'], $_GET['id'])) {
			                $title = $this->test_input($_POST['title']);
			                $chapo = $this->test_input($_POST['chapo']);
			                $content = $this->test_input($_POST['content']);
			                $author = $this->test_input($_POST['author']);
			                $postId = $this->test_input($_GET['id']);

			                $editPost = $this->postManager->editPost($title, $chapo, $content, $author, $postId);

				                if ($editPost === false) {
				                    throw new Exception('Impossible de modifier l\'article !');
				                    return;
				                }

			                header('Location: index.php?action=post&id=' . $_GET['id']);
			            }
        			} else {
        				header('Location: index.php?action=access-denied');
        			}
        		}
        	}
        } else {
        	header('Location: index.php?action=access-denied');
        }

        require('../view/frontend/post/edit.php');
    }



    function delete($postId)
    {
        session_start();
        if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true)
        {
        	$post = $this->postManager->getPost($postId);
        	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			    if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
	    			if ($_SESSION['token'] == $_POST['token']) {
						$post = $this->postManager->deletePost($postId);
						$comments = $this->commentManager->deleteCommentsFromPost($postId);
						header('Location: index.php?action=listPosts');
					} else {
	   					header('Location: index.php?action=access-denied');
					}
				}
			}
		} else {
			header('Location: index.php?action=access-denied');
		}

        require('../view/frontend/post/delete.php');
    }



    function addPost()
    {
        session_start();
        	if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true)
       		{
        		$author = $this->test_input($_SESSION['nickname']);

		        if ($_SERVER["REQUEST_METHOD"] == "POST") {

		            if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
    					if ($_SESSION['token'] == $_POST['token']) {
				            if (empty($_POST["title"]) || empty($_POST["chapo"]) || empty($_POST["content"]) || empty($author)) {
				                $error = "Vous devez remplir tout les champs";
				            } else {
				                $title = $this->test_input($_POST["title"]);
				                $chapo = $this->test_input($_POST["chapo"]);
				                $content = $this->test_input($_POST["content"]);
				            }

				            if (isset($title, $content, $chapo, $author)) {
				                $req = $this->postManager->addNewPost($title, $content, $chapo, $author);
				                header('Location: index.php?action=listPosts');
				            }


		    			} else {
   							$error = "Jeton CSRF invalide";
						}
					}
				}
			} else {
		    	header('Location: index.php?action=access-denied');
			}
		require('../view/frontend/post/addPost.php');
    }



    function accessDenied()
    {
        require('../view/frontend/accessDenied/accessDenied.php');
    }

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities(strip_tags($data));
        return $data;
    }
}
