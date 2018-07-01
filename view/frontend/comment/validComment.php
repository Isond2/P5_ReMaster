<!DOCTYPE html>
<html>
<head>
    <title>Valider un commentaire</title>
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

<h1 class="Titre"> Valider un commentaire </h1>


<div id="contenupage" class="center">
    <p><?php echo htmlspecialchars($message); ?></p>
    <a href="index.php?action=listPosts" class="btn btn-default"> Revenir à la liste des arcticles </a>
    <br />
    <br />
    <form method="post">
        <input type="submit" value="<?php echo htmlspecialchars($btn); ?>" class="btn btn-warning" />
        <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
    </form>
</div>

</body>
</html>
