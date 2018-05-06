<?php
require_once('../model/CommentManager.php');

/**
*
*/
class CommentController
{
    private $commentManager;

    function __construct() {
        $this->commentManager= new CommentManager();
    }

    function addComment($postId, $author, $comment)
    {
        $safeAuthor = htmlspecialchars($author);
        $safeComment = htmlspecialchars($comment);
        $affectedLines = $this->commentManager->postComment($postId, $safeAuthor, $safeComment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    function commentTrue($commentId)
    {
        $comment = $this->commentManager->getComment($commentId);

        if (isset($_POST['csrf'])) {
            $comment = $this->commentManager->commentValidation($commentId);
            header('Location: index.php?action=listPosts');
        }

        $message = 'Êtes vous sur de vouloir valider le commentaire " '. $comment['comment'].' " ? ' ;
        $btn = 'Valider';

        require('../view/frontend/comment/validComment.php');
    }

    function commentFalse($commentId)
    {
        $comment = $this->commentManager->getComment($commentId);

        if (isset($_POST['csrf'])) {
            $comment = $this->commentManager->commentRejection($commentId);
            header('Location: index.php?action=listPosts');
        }

        $message = 'Êtes vous sur de vouloir supprimer le commentaire " '. $comment['comment'].' " ? ' ;
        $btn = 'Supprimer';

        require('../view/frontend/comment/validComment.php');
    }
}
