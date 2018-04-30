<?php

require_once("Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
            $database = $this->dbConnect();
            $req = $database->query('SELECT id, chapo, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

            return $req;
    }

    public function getPost($postId)
    {
        $database = $this->dbConnect();
        $req = $database->prepare('SELECT id, title, content, author, chapo, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function editPost($title, $chapo, $content, $author, $postId)
    {
        $database = $this->dbConnect();
        $post = $database->prepare('UPDATE posts SET title = ?, chapo =? , content =? , author =? , creation_date =NOW() WHERE id =?');
        $editPost = $post->execute(array($title, $chapo, $content, $author, $postId));

        return $editPost;
    }

    public function addNewPost($title, $content, $chapo, $author)
    {
        $database = $this->dbConnect();
        $req = $database->prepare('INSERT INTO posts SET title = ?, content =? , chapo =? , author =? , creation_date =NOW()');
        $req->execute(array($title, $content, $chapo, $author));

        return $req;
    }

    public function deletePost($postId)
    {
        $database = $this->dbConnect();
        $del = $database ->prepare('DELETE FROM posts WHERE id = ?');
        $post = $del->execute(array($postId));

        return $post;
    }
}
