<!DOCTYPE html>
<html>
<head>
    <title> Article </title>
    <meta charset="utf-8">
</head>
<body>

<link rel="stylesheet" type="text/css" href="frontend/css/post_articlephp.css">
<link rel="stylesheet" type="text/css" href="frontend/css/arcticle.css">
<link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
<link rel="stylesheet" type="text/css" href="frontend/css/Redaction.css">

<?php include 'frontend/Menu.php'; ?>


<?php if (isset($post)) { ?>
<h1 class="Titre"> Article </h1>
<div id="contenupage">

    <p class="arcticle_date_auteur"><span class ="Dernieremodif"> Dernière modification le : </span> <?php echo htmlentities($post['creation_date_fr']); ?> <br/> </p>

    <h1 class="arcticle_titre"><?php echo htmlentities($post['title']); ?></h1>

    <p class="arcticle_date_auteur">Auteur : <br/> <?php echo htmlentities($post['author']); ?> <br/> </p>

    <h3><?php echo htmlentities($post['chapo']); ?></h3>
    <p class="arcticle_contenu"><?php echo htmlentities($post['content']); ?></p>

    <?php if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true) {?>
        <a href="index.php?action=edit&amp;id=<?= $post['id'] ?>" class="btn btn-default"> Modifier </a>
        <a href="index.php?action=delete&amp;id=<?= $post['id'] ?>" class="btn btn-warning"> Supprimer </a>
    <?php } else { ?>
    <?php } ?>


<h2>Ajouter un commentaire</h2>

    <?php if (isset($_SESSION['id']) and isset($_SESSION['nickname'])) {
    $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    $_SESSION['token'] = $token;?>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <input type="hidden" id="author" name="author" value="<?php echo htmlentities($_SESSION['nickname']) ?>" />
    <div>
        <label for="comment">Commentaire :</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-default" value="Envoyer" />
    </div>
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
</form>
<?php } else { ?>
    <div><span class="connectezVous"><a href="index.php?action=login">Connectez-vous</a></span> pour pouvoir poster des commentaires</div>
<?php } ?>



<?php if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true) {?>
<h2>Commentaires à approuver</h2>

<?php
while ($falseComments = $approuvedComments->fetch()) {
?>
    <p><strong><?= $falseComments['author'] ?></strong> le <?= $falseComments['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlentities($falseComments['comment'])) ?></p> <a href="index.php?action=commentTrue&amp;id=<?= $falseComments['id'] ?>" class="btn btn-default" > Valider </a><a href="index.php?action=commentFalse&amp;id=<?= $falseComments['id'] ?>" class="btn btn-default"> Supprimer </a>
<?php
}
?>
<?php } else { ?>
<?php } ?>


<h2>Commentaires</h2>
<?php
while ($trueComment = $comments->fetch()) {
?>
    <p><strong><?= $trueComment['author'] ?></strong> le <?= $trueComment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlentities($trueComment['comment'])) ?></p>
<?php
}
?>
</div>




<?php } else { ?>
    <h1 class="Titre"> L'article demandé n'existe pas </h1>
<?php } ?>

</body>
</html>
