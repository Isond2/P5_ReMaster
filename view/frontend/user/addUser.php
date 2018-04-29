<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="frontend/css/posts.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/Redaction.css">
</head>
<body>

<?php include("frontend/Menu.php"); ?>

<h1 class="Titre"> S'inscrire </h1>
<div id="contenupage">

<form method="post">
    <div>
        <label for="nickname">nickname</label><br />
        <input type="text" id="nickname" name="nickname" />
    </div>
    <div>
        <label for="password">password</label><br />
        <input type="text" id="password" name="password" />
    </div>
    <div>
        <label for="email">email</label><br />
        <textarea type="text" id="email" name="email"> </textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-success"/>
    </div>
</form>
</div>

</body>
</html>
