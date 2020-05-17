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
    <link rel="stylesheet" href="css/MakeAccount.css">
</head>
<body>
    <h2 id="titre">Créer un compte</h2>
    <div id="LesForms">
        <form action="CreateAccountCandidat.php" method="post">
            <input id="nom" type="text" name="nom" placeholder="NOM" />
            <input class="reste" type="text" name="prenom" placeholder="PRENOM" />
            <input class="reste" type="text" name="username" placeholder="NOM D'UTILISATEUR" />
            <input class="reste" type="text" name="email" placeholder="EMAIL" />
            <input class="reste" type="text" name="mdp" placeholder="MOT DE PASSE" />
            <button class='button' type="submit">Envoyer</button>
        </form>
        <form action="index.php">
            <button class='button' type="submit">Connexion</button>
        </form>
    </div>
</body>
</html>