<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>TP noté</title>
        <link rel="stylesheet" href="css/RegarderOffre.css">
    </head>
    <body>

<?php

require('PDO.php');
$pdo = bddConnect();

$OffreID = $_POST['id'];

$query = $pdo->prepare('SELECT * FROM offres where OffreID = :OffreID');
$query->execute(array( "OffreID"=>$OffreID ));
$res = $query->fetch();

$IDCompte = $res['IDCompte'];
$entreprise = $res["username"];

echo "
<div id='premier'>
    <h2 id='texte'>
        L'entreprise " . $entreprise . " propose un job : 
        <br> 
        <br>
        Description : 
        <br>
        " . $res["Description"] . " 
        <br>
        <br>
        Location :" . $res["location"] . " 
        <br>
        <br>
        Vous pouez les contactez avec le numéro de téléphone suivant : " . $res["tel"] . "
        <br>
        <br>
        Ou avec l'adresse Email suivant : " . $res["emailpro"] . "
        <br>
        <br>
        Vous pouvez postuler avec le bouton suivant qui va envoyer votre cv à l'entreprise.
    </h2>
    <br>
    <br>
    <form action='SendPostulat.php' method='post'>
        <button class='button' type='submit' name = 'nom' value='$entreprise'>Envoyer votre CV</button>
        <input type='hidden' name='IDOffre' value='$OffreID'>
        <input type='hidden' name='IDCOmpte' value='$IDCompte'>
    </form>
</div>"
;
?>

    </body>
</html>