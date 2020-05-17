<?php 

if (isset($_SESSION['IS_CONNECTED'])) {
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>TP noté</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<h2 id="titre">Connexion</h2>
    <div id="LesForms">
        <form action="connexion.php" method="post">
            <input id='username' type="text" name="username" placeholder="username" />
            <input id='password' type="password" name="pwd" placeholder="password" />
            <button class='button' type="submit">connexion</button>
        </form>
        <form action="MakeAccountCandidat.php" method="post">
            <button class='button' type="submit">Créer un compte candidat</button>
        </form>
        <form action="MakeAccountEntreprise.php" method="post">
            <button class='button' type="submit">Créer un compte entreprise</button>
        </form>
    <div>
</body>
</html>