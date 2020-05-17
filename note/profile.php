<?php

session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>TP noté</title>
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>

<?php

require('PDO.php');
$pdo = bddConnect();

if($_SESSION['CompteType']=='ADMIN'){

    $nom = $_POST["username"];

} else {

    $nom = $_SESSION["username"];
    
}

$query = $pdo->prepare('SELECT emailpro, Description, tel, diplome FROM compte WHERE username = :nom');
$query->execute(array("nom"=>$nom));
$resultat = $query->fetch();

$email = $resultat["emailpro"];
$Description = $resultat["Description"];
$tel = $resultat["tel"];
$diplome = $resultat["diplome"];


echo "
<div id='premier'>
    <form class=''action='SendProfile.php' method='post'>
        <label class='label'>Téléphone : <input type='text' name='Téléphone' value='$tel' ></label><br>
        <label class='label'>Adresse email : <input type='text' name='email' value='$email' ></label><br>
        <label class='label'>Dernier diplome : <input type='text' name='diplome' value='$diplome' ></label><br>
        <label class='label'>Description :<textarea id='w3mission' name='description'>$Description
        </textarea></label><br>
        <button class='button' type='submit'>Envoyer</button>
    </form>
</div>

"

?>

    </body>
</html>