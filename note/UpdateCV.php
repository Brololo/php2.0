<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>TP noté</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

<?php

require('PDO.php');

$pdo = bddConnect();

$nom = $_SESSION['username'];

$query = $pdo->prepare('SELECT FirstName, LastName FROM compte WHERE username = :nom');
$query->execute(array("nom"=>$nom));
$resultat = $query->fetch();

$folder = strtolower($resultat["LastName"]."_".$resultat["FirstName"]);

$destination = "$folder/CV.pdf";

$mime = file_get_contents($_FILES["fileToUpload"]["tmp_name"], NULL, NULL, 0, 5);

if($mime == "%PDF-"){
    if(!file_exists($destination)){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$destination");
        echo"<h1 class='truc'>Votre CV est arrivé à destination sans troubles<h1 class='truc'>";
    } else { 
        unlink($destination);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$destination");
        echo"<h1 class='truc'>Votre CV est arrivé à destination sans troubles</h1>";
    }
} else {
    echo "<h1 class='truc'>Vous n'avez pas choisi un fichier en format PDF</h1>";
}
echo"
<div id='premier'>
    <form action='home.php' method='post' >
        <button class='button'>Retour</button>
    </form>
</div>
"
?>

    </body>
</html>