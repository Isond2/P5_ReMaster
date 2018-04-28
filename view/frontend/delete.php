<!DOCTYPE html>
<html>
<head>
    <title>Modifier un arcticle</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="frontend/css/posts.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/Redaction.css">
</head>
<body>

<?php include("Menu.php"); ?>

<h1 class="Titre"> Supprimer un article </h1>


<div id="contenupage" class="center">
    <p>Êtes vous dur de vouloir supprimer l'article " <?= $post['title'] ?> " ?</p>
    <a href="index.php?action=listPosts" class="btn btn-default"> Revenir à la liste des arcticles </a>
    <br />
    <br />
    <form action="index.php?action=deleteAction&amp;id=<?= $post['id'] ?>" method="post">
            <input type="submit" value="Supprimer" class="btn btn-danger" />
    </form>
</div>

</body>
</html>
