<!DOCTYPE html>
<html>
<head>
    <title>Modifier un arcticle</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="frontend/posts.css">
    <link rel="stylesheet" type="text/css" href="frontend/BootstrapBoutonSeulement.css">
    <link rel="stylesheet" type="text/css" href="frontend/Redaction.css">
</head>
<body>

<?php include ("Menu.php"); ?>

<h1 class="Titre"> Supprimer un article </h1>
<p>Êtes vous dur de vouloir supprimer l'article " <?= $post['title'] ?> " ?</p>

<div id="contenupage">
<a href="index.php?action=listPosts" class="btn btn-default"> Revenir à la liste des arcticles </a>
<form action="index.php?action=deleteAction&amp;id=<?= $post['id'] ?>" method="post">
        <input type="submit" value="Supprimer" />
    </div>
</form>
</div>

</body>
</html>
