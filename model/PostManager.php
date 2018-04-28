<?php

require_once("Manager.php");

class PostManager extends Manager
{
   	public function getPosts()
	    {
	        $db = $this->dbConnect();
	        $req = $db->query('SELECT id, chapo, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

	        return $req;
	    }

	    public function getPost($postId)
	    {
	        $db = $this->dbConnect();
	        $req = $db->prepare('SELECT id, title, content, author, chapo, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
	        $req->execute(array($postId));
	        $post = $req->fetch();

	        return $post;
	    }

	    public function editPost($title, $chapo, $content, $author, $postId)
	    {
	        $db = $this->dbConnect();
        	$post = $db->prepare('UPDATE posts SET title = ?, chapo =? , content =? , author =? , creation_date =NOW() WHERE id =?');
        	$editPost = $post->execute(array($title, $chapo, $content, $author, $postId));

        	return $editPost;
	    }

	    public function addNewPost($title, $content, $chapo, $author)
	    {
	        $db = $this->dbConnect();
        	$req = $db->prepare('INSERT INTO posts SET title = ?, content =? , chapo =? , author =? , creation_date =NOW()');
        	$req->execute(array($title, $content, $chapo, $author));

        	return $affectedLines;
	    }

	    public function deletePost($postId)
	    {
	        $db = $this->dbConnect();
        	$del = $db ->prepare('DELETE FROM posts WHERE id = ?');
    		$post = $del->execute(array($postId));

        	return $post;
	    }
}