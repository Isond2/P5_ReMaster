<?php
require_once("Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $database = $this->dbConnect();
        $comments = $database->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND approuved = true ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getApprouvedComments($postId)
    {
        $database = $this->dbConnect();
        $approuvedComments = $database->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND approuved = false ORDER BY comment_date DESC');
        $approuvedComments->execute(array($postId));

        return $approuvedComments;
    }


    public function getComment($commentId)
    {
        $database = $this->dbConnect();
        $req = $database->prepare('SELECT * FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function postComment($postId, $author, $comment)
    {
        $database = $this->dbConnect();
        $comments = $database->prepare('INSERT INTO comments(post_id, author, comment, comment_date, approuved) VALUES(?, ?, ?, NOW(), false)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function commentValidation($commentId)
    {
        $database = $this->dbConnect();
        $comment = $database->prepare('UPDATE comments SET approuved = true WHERE id = ?');
        $validComment = $comment->execute(array($commentId));

        return $validComment;
    }

    public function commentRejection($commentId)
    {
        $database = $this->dbConnect();
        $comment = $database->prepare('DELETE FROM comments WHERE id = ?');
        $rejectedComment = $comment->execute(array($commentId));

        return $rejectedComment;
    }
}
