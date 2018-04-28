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

    require('../view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('../view/frontend/postView.php');
}

function edit()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    require('../view/frontend/edit.php');
}

function delete()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    require('../view/frontend/delete.php');
}

function deleteAction($postId)
{
    $postManager = new PostManager();
    $post = $postManager->deletePost($postId);

    header('Location: index.php?action=listPosts');
}

function addPost()
{
    require('../view/frontend/addPost.php');
}

function addNewPost($title, $content, $chapo, $author)
{
    $postManager = new PostManager();

    $req = $postManager->addNewPost($title, $content, $chapo, $author);

    if ($req === false) {
        throw new Exception('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function addEditPost($title, $chapo, $content, $author, $postId)
{
    $postManager = new PostManager();

    $editPost = $postManager->editPost($title, $chapo, $content, $author, $postId);

    if ($editPost === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}