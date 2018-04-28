<!DOCTYPE html>
<html>
<head>
	<title>Liste des posts</title>
	<meta charset="utf-8">
</head>
<body>

<link rel="stylesheet" type="text/css" href="frontend/css/post_articlephp.css">
<link rel="stylesheet" type="text/css" href="frontend/css/arcticle.css">
<link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
<link rel="stylesheet" type="text/css" href="frontend/css/Redaction.css">

<?php include 'menu.php'; ?>


<?php if (isset($comments)) { ?>
<h1 class="Titre"> Article </h1>
<div id="contenupage">

    <p class="arcticle_date_auteur"><span class ="Dernieremodif"> Dernière modification le : </span> <?php echo $post['creation_date_fr']; ?> <br/> </p>

    <h1 class="arcticle_titre"><?php echo $post['title']; ?></h1>

    <p class="arcticle_date_auteur">Auteur : <br/> <?php echo $post['author']; ?> <br/> </p>

    <h3><?php echo $post['chapo']; ?></h3>
    <p class="arcticle_contenu"><?php echo $post['content']; ?></p>
    <a href="index.php?action=edit&amp;id=<?= $post['id'] ?>" class="btn btn-default"> Modifier </a>
    <a href="index.php?action=delete&amp;id=<?= $post['id'] ?>" class="btn btn-warning"> Supprimer </a>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
</div>




<?php }

else { ?>
	<h1 class="Titre"> L'article demandé n'existe pas </h1>
<?php } ?>

</body>
</html>