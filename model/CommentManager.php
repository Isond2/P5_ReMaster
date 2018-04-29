<?php
require_once("Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND approuved = true ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getApprouvedComments($postId)
    {
        $db = $this->dbConnect();
        $approuvedComments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND approuved = false ORDER BY comment_date DESC');
        $approuvedComments->execute(array($postId));

        return $approuvedComments;
    }


    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, approuved) VALUES(?, ?, ?, NOW(), false)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function commentValidation($commentId, $postId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comments SET approuved = true WHERE id = ?');
        $validComment = $comment->execute(array($commentId));

        return $validComment;
    }

    public function commentRejection($commentId, $postId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM comments WHERE id = ?');
        $rejectedComment = $comment->execute(array($commentId));

        return $rejectedComment;
    }
}
