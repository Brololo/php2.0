<?php

session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>TP noté</title>
        <link rel="stylesheet" href="css/ModifierOffre.css">
    </head>
    <body>

<?php

require('PDO.php');
$pdo = bddConnect();

$nom = $_SESSION["username"];
$id = $_POST["id"];
$IDOffre = $_POST["id"];

$query = $pdo->prepare('SELECT * FROM offres WHERE OffreID = :id');
$query->execute(array("id"=>$id));
$resultat = $query->fetch();

$titre = $resultat["titre"];
$emailpro = $resultat["emailpro"];
$tel = $resultat["tel"];
$location = $resultat["location"];
$diplome = $resultat["diplome"];
$Description = $resultat["Description"];

echo "
<div id='premier'>
    <form action='SendOffre.php' method='post'>
        <input type='hidden' name='id' value='TRUE'>
        <label class='label'>Titre : <input type='text' name='titre' placeholder='Votre entreprise' value='$titre'></label><br>
        <label class='label'>Email : <input type='text' name='emailpro' value='$emailpro'></label><br>
        <label class='label'>Téléphone : <input type='text' name='Téléphone' value='$tel'></label><br>
        <label class='label'>Location : <input type='text' name='location' value='$location'></label><br>
        <label class='label'>Diplome minimun : <input type='text' name='diplome' value='$diplome'></label><br>
        <label class='label'>Décrire l'offre :
        <textarea name='description'>$Description</textarea></label><br>
        <button class='button' type='submit' name='IDOffre' value='$IDOffre'>Envoyer</button>
    </form>

    <form action='deleteoffre.php' method='post'>
        <button class='button' type='submit' name='IDOffre' value='$IDOffre'>Supprimer l'offre</button>
    </form>
    <form action='home.php' >
        <button class='button' type='submit'>Retour</button>
    </form>
</div>

"
?>

    </body>
</html>