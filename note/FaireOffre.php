<?php

session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>TP noté</title>
        <link rel="stylesheet" href="css/offre.css">
    </head>
    <body>



<?php

require('PDO.php');
$pdo = bddConnect();

echo "
<div id='premier'>
    <form action='SendOffre.php' method='post'>
        <label class='label'>Titre : <input type='text' name='titre'></label><br>
        <label class='label'>Email : <input type='text' name='emailpro'></label><br>
        <label class='label'>Téléphone : <input type='text' name='Téléphone'></label><br>
        <label class='label'>Location : <input type='text' name='location'></label><br>
        <label class='label'>Diplome minimun : <input type='text' name='diplome'></label><br>
        <label class='label'>Décrire l'offre :
        <textarea name='description'></textarea></label><br>
        <button class='button' type='submit'>Envoyer</button>
    </form>
</div>

"

?>

    </body>
</html>