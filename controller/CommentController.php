<?php
require_once('../model/CommentManager.php');

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function commentValidationForm($commentId)
{

    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($commentId);
    require('../view/frontend/comment/validComment.php');
}

function commentTrue($commentId)
{
    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($commentId);

    if (isset($_POST['csrf'])) {
        $comment = $commentManager->commentValidation($commentId);
        header('Location: index.php?action=listPosts');
    }

    $message = 'Êtes vous sur de vouloir valider le commentaire " '. $comment['comment'].' " ? ' ;
    $btn = 'Valider';

    require('../view/frontend/comment/validComment.php');
}

function commentFalse($commentId)
{
    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($commentId);

    if (isset($_POST['csrf'])) {
        $comment = $commentManager->commentRejection($commentId);
        header('Location: index.php?action=listPosts');
    }

    $message = 'Êtes vous sur de vouloir supprimer le commentaire " '. $comment['comment'].' " ? ' ;
    $btn = 'Supprimer';

    require('../view/frontend/comment/validComment.php');
}
