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

<?php include("frontend/Menu.php");
$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$_SESSION['token'] = $token;
?>



<h1 class="Titre">Rédiger un article </h1>
<div id="contenupage">


<form action="index.php?action=addPost" method="post" >
    <p><?php if (isset($error)) { echo htmlspecialchars($error); } ?></p>
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
        <textarea type="text" id="content" name="content"></textarea>
        Auteur : <strong> <?php echo htmlspecialchars($_SESSION['nickname']); ?> </strong><br /><br />
    </div>
    <div>
        <input type="submit" class="btn btn-success"/>
    </div>
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
</form>
</body>
</html>
