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
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $approuvedComments = $commentManager->getApprouvedComments($_GET['id']);

    require('../view/frontend/post/postView.php');
}

function edit()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);
    if (isset($_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['author'], $_GET['id'])) {
        $title = htmlspecialchars($_POST['title']);
        $chapo = htmlspecialchars($_POST['chapo']);
        $content = htmlspecialchars($_POST['content']);
        $author = htmlspecialchars($_POST['author']);
        $postId = htmlspecialchars($_GET['id']);

        $editPost = $postManager->editPost($title, $chapo, $content, $author, $postId);

        if ($editPost === false) {
            throw new Exception('Impossible de modifier l\'article !');
        } else {
            header('Location: index.php?action=post&id=' . $_GET['id']);
        }
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
    if (isset($_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['author'])) {
        $title = htmlspecialchars($_POST['title']);
        $chapo = htmlspecialchars($_POST['chapo']);
        $content = htmlspecialchars($_POST['content']);
        $author = htmlspecialchars($_POST['author']);

        $postManager = new PostManager();

        $req = $postManager->addNewPost($title, $content, $chapo, $author);

        if ($req === false) {
            throw new Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }
    require('../view/frontend/post/addPost.php');
}