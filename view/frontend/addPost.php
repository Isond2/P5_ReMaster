<!DOCTYPE html>
<html>
<head>
    <title>Rédiger un article</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="frontend/css/posts.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/Redaction.css">
</head>
<body>

<?php include("Menu.php"); ?>

<h1 class="Titre"> Rédiger un article </h1>
<div id="contenupage">

<form action="index.php?action=addNewPost" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="chapo">Châpo</label><br />
        <input type="text" id="chapo" name="chapo" />
    </div>
    <div>
        <label for="content">Contenu</label><br />
        <textarea type="text" id="content" name="content"> </textarea>
    </div>
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <input type="submit" class="btn btn-success"/>
    </div>
</form>
</div>

</body>
</html>
