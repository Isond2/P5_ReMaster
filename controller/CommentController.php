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
        session_start();
        if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true)
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
                    if ($_SESSION['token'] == $_POST['token']) {

                        $safeAuthor = $this->test_input($author);
                        $safeComment = $this->test_input($comment);
                        $affectedLines = $this->commentManager->postComment($postId, $safeAuthor, $safeComment);

                        if ($affectedLines === false) {
                            throw new Exception('Impossible d\'ajouter le commentaire !');
                        } else {
                            header('Location: index.php?action=post&id=' . $postId);
                        }
                    } else {
                        header('Location: index.php?action=access-denied');
                    }
                }
            }
        } else {
            header('Location: index.php?action=access-denied');
        }
    }




    function commentTrue($commentId)
    {
        session_start();
        if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true)
        {
            $comment = $this->commentManager->getComment($commentId);
            $postId = $comment['post_id'];
            $message = 'Êtes vous sur de vouloir valider le commentaire " '. $comment['comment'].' " ? ' ;
            $btn = 'Valider';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
                    if ($_SESSION['token'] == $_POST['token']) {
                        $comment = $this->commentManager->commentValidation($commentId);
                        header('Location: index.php?action=post&id=' . $postId);
                    } else {
                        header('Location: index.php?action=access-denied');
                    }
                }
            }
        } else {
            header('Location: index.php?action=access-denied');
        }
        require('../view/frontend/comment/validComment.php');
    }


    function commentFalse($commentId)
    {
        session_start();
        if (isset($_SESSION['nickname']) and isset($_SESSION['id']) and $_SESSION['role']==true)
        {
            $comment = $this->commentManager->getComment($commentId);
            $postId = $comment['post_id'];
            $message = 'Êtes vous sur de vouloir supprimer le commentaire " '. $comment['comment'].' " ? ' ;
            $btn = 'Supprimer';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
                    if ($_SESSION['token'] == $_POST['token']) {
                        $comment = $this->commentManager->commentRejection($commentId);
                        header('Location: index.php?action=post&id=' . $postId);
                    } else {
                        header('Location: index.php?action=access-denied');
                    }
                }
            }
        } else {
            header('Location: index.php?action=access-denied');
        }
        require('../view/frontend/comment/validComment.php');
    }

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities(strip_tags($data));
        return $data;
    }
}
