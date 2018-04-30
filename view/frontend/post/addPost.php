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

<?php include("frontend/Menu.php"); ?>

<h1 class="Titre"> Rédiger un article </h1>
<div id="contenupage">
<?php if (isset($_SESSION['id']) and isset($_SESSION['nickname']) and $_SESSION['role']==true) {?>


<form action="index.php?action=addPost" method="post" >
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
        <input type="hidden" id="author" name="author" value="<?php echo htmlspecialchars($_SESSION['nickname'])?>" />
    <div>
        Auteur : <strong> <?php echo htmlspecialchars($_SESSION['nickname']); ?> </strong><br /><br />
    </div>
    <div>
        <input type="submit" class="btn btn-success"/>
    </div>
</form>
<?php } else { ?>
<div class="center">Seul les administrateurs peuvent ajouter des articles.</div>
</div>
<?php } ?>
</body>
</html>
