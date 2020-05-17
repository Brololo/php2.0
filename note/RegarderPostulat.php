<?php

session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>TP noté</title>
        <link rel="stylesheet" href="css/RegarderCandidatures.css">
    </head>
    <body>

<?php

require('PDO.php');
$pdo = bddConnect();

$OffreID = $_POST["OffreID"];

$query = $pdo->prepare('SELECT * FROM postulat where OffreID = :OffreID');
$query->execute(array( "OffreID"=>$OffreID ));
$res = $query->fetchall();



if(empty($res)==FALSE){
    foreach($res as $postulat){
        $candidat = $postulat["IDCANDIDAT"];
        $query = $pdo->prepare('SELECT * FROM compte where IDCompte = :IDCompte');
        $query->execute(array( "IDCompte"=>$candidat ));
        $Info = $query->fetch();
        $firstname = $Info["FirstName"];
        $lastname = $Info["LastName"];
        $file = $lastname . "_" . $firstname . "/CV.pdf";
        $PostulatID = $postulat['PostulatID'];
        echo "
        <div id='premier'>
            <h2 id='texte'>
            $lastname $firstname 
            </br> a déposé une candidature
            </h2>
            <form action='RegarderCV.php' method='post' >
                <button class='button' type='submit' name='file' value='$file'>Regarder le CV</button>
            </form>
            <form action='reponse.php' method='post' >
                <input type='hidden' name='PostulatID' value='$PostulatID'>
                <button class='button' type='submit' name='reponse' value='OUI'>Accepter la candidature</button>
            </form>
            <form action='reponse.php' method='post' >
                <input type='hidden' name='PostulatID' value='$PostulatID'>
                <button class='button' type='submit' name='reponse' value='NON'>Refuser la candidature</button>
            </form>
        </div>
    " ;
    }
} else {
    echo"
        <div id='premier'>
            <h2 id='texte'>
                Personne n'a postulé pour votre offre pour l'instant, revenez plus tard !
                <br>
                <br>
                <form action='home.php' >
                <button class='button' type='submit'>Retour</button>
                </form>
            </h2>
        </div>
    ";
    
}
?>

    </body>
</html>