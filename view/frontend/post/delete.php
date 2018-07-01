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

<?php include("frontend/Menu.php");
$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$_SESSION['token'] = $token;
?>

<h1 class="Titre"> Supprimer un article </h1>


<div id="contenupage" class="center">
    <p>Êtes vous sur de vouloir supprimer l'article " <?= $post['title'] ?> " ?</p>
    <a href="index.php?action=listPosts" class="btn btn-default"> Revenir à la liste des arcticles </a>
    <br />
    <br />
    <form method="post">
        <input type="submit" value="Supprimer" class="btn btn-danger" />
        <input type="hidden" name="token" id="token" value="<?php echo $token;?>"/>
    </form>
</div>

</body>
</html>
