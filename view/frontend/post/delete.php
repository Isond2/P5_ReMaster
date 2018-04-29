<!DOCTYPE html>
<html>
<head>
    <title>Supprimer un arcticle</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="frontend/css/posts.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/Redaction.css">
</head>
<body>

<?php include("frontend/Menu.php"); ?>

<h1 class="Titre"> Supprimer un article </h1>


<div id="contenupage" class="center">

<?php if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true) {?>
    <p>Êtes vous dur de vouloir supprimer l'article " <?= $post['title'] ?> " ?</p>
    <a href="index.php?action=listPosts" class="btn btn-default"> Revenir à la liste des arcticles </a>
    <br />
    <br />
    <form method="post">
        <input type="hidden" name="csrf" value="csrf">
        <input type="submit" value="Supprimer" class="btn btn-danger" />
    </form>
<?php } else { ?>
    <p> Vous ne disposez pas des droit nécéssaires pour supprimer un arcticle </p>
<?php } ?>
</div>

</body>
</html>
