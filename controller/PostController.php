<?php

require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');


function home()
{
    require('../view/frontend/home.php');
}


function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('../view/frontend/post/listPostsView.php');
}

function post()
{
    $id = $_GET['id'];
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($id);
    $comments = $commentManager->getComments($id);
    $approuvedComments = $commentManager->getApprouvedComments($id);

    require('../view/frontend/post/postView.php');
}

function edit()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);
    if (isset($_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['author'], $_GET['id'])) {
        $title = test_input($_POST['title']);
        $chapo = test_input($_POST['chapo']);
        $content = test_input($_POST['content']);
        $author = test_input($_POST['author']);
        $postId = test_input($_GET['id']);

        $editPost = $postManager->editPost($title, $chapo, $content, $author, $postId);

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

    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    if (isset($_POST['csrf'])) {
        $postManager = new PostManager();
        $post = $postManager->deletePost($postId);

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
            $title = test_input($_POST["title"]);
            $chapo = test_input($_POST["chapo"]);
            $content = test_input($_POST["content"]);
            $author = test_input($_POST["author"]);
        }


        if (isset($title, $content, $chapo, $author)) {

            $postManager = new PostManager();
            $req = $postManager->addNewPost($title, $content, $chapo, $author);
            header('Location: index.php?action=listPosts');
        }
    }
    require('../view/frontend/post/addPost.php');
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
