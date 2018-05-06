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

        require('../view/frontend/post/postView.php');
    }

    function edit()
    {

        $post = $this->postManager->getPost($_GET['id']);
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

        require('../view/frontend/post/edit.php');
    }

    function delete($postId)
    {


        $post = $this->postManager->getPost($_GET['id']);

        if (isset($_POST['csrf'])) {
            $post = $this->postManager->deletePost($postId);

            header('Location: index.php?action=listPosts');
        }
        require('../view/frontend/post/delete.php');
    }

    function addPost()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["title"]) || empty($_POST["chapo"]) || empty($_POST["content"]) || empty($_POST["author"])) {
                $error = "Vous devez remplir tout les champs";
            } else {
                $title = $this->test_input($_POST["title"]);
                $chapo = $this->test_input($_POST["chapo"]);
                $content = $this->test_input($_POST["content"]);
                $author = $this->test_input($_POST["author"]);
            }

            if (isset($title, $content, $chapo, $author)) {
                $req = $this->postManager->addNewPost($title, $content, $chapo, $author);
                header('Location: index.php?action=listPosts');
            }
        }
        require('../view/frontend/post/addPost.php');
    }

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
