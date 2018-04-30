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

<?php include("frontend/Menu.php"); ?>

<h1 class="Titre"> Modifier un article </h1>

<div id="contenupage">

<?php if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true) {?>
<form method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>"/>
    </div>
    <div>
        <label for="chapo">Châpo</label><br />
        <input type="text" id="chapo" name="chapo" value="<?php echo htmlspecialchars($post['chapo']); ?>" />
    </div>
    <div>
        <label for="content">Contenu</label><br />
        <textarea type="text" id="content" name="content"><?php echo htmlspecialchars($post['content']); ?></textarea>
    </div>
        <input type="hidden" id="author" name="author" value="<?php echo htmlspecialchars($_SESSION['nickname'])?>"/>
    <div>
        <input type="submit" value="Modifier" class="btn btn-warning" />
    </div>
</form>
<?php } else { ?>
    <div class="center">Seul les administrateurs peuvent modifier des articles.</div>
<?php } ?>
</div>

</body>
</html>
