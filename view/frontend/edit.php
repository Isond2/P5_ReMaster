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

<?php include ("Menu.php"); ?>

<h1 class="Titre"> Modifier un article </h1>

<div id="contenupage">

<form action="index.php?action=editAction&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>"/>
    </div>
    <div>
        <label for="chapo">Châpo</label><br />
        <input type="text" id="chapo" name="chapo" value="<?php echo $post['chapo']; ?>" />
    </div>
    <div>
        <label for="content">Contenu</label><br />
        <textarea type="text" id="content" name="content"><?php echo $post['content']; ?></textarea>
    </div>
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" value="<?php echo $post['author']; ?>"/>
    </div>
    <div>
        <input type="submit" value="Modifier" class="btn btn-warning" />
    </div>
</form>
</div>

</body>
</html>
