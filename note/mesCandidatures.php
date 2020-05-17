<?php

session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>TP noté</title>
        <link rel="stylesheet" href="css/MesCandidatures.css">
    </head>
    <body>

<?php

require('PDO.php');
$pdo = bddConnect();

$IDCANDIDAT = $_SESSION['IDCompte'];

$query = $pdo->prepare('SELECT * FROM postulat WHERE IDCANDIDAT = :IDCANDIDAT');
$query->execute(array("IDCANDIDAT"=>$IDCANDIDAT));
$resultat = $query->fetchall();

foreach($resultat as $candidature){
    $OffreID = $candidature['OffreID'];
    $query = $pdo->prepare('SELECT * FROM offres WHERE OffreID = :OffreID');
    $query->execute(array('OffreID'=>$OffreID));
    $res = $query->fetch();
    $reponse = $candidature['Accepter'];
    $titre = $res['titre'];
    $email = $res['emailpro'];
    $tel = $res['tel'];
    $entreprise = $res['username'];

    if($reponse == 'OUI'){
        echo "
        <div id='premier'>
            <h2 id='texte'>
                Votre candidature chez $entreprise avec pour titre $titre à été accepté.
                <br> Veuillez contactez l'entreprise avec l'adresse email $email ou avec le numéro suivant $tel.
                <br>
                <br>
            </h2>
        </div>
        " ;
    } elseif($reponse == '?'){
        echo "
        <div id='premier'>
            <h2 id='texte'>
                Votre candidature chez $entreprise avec pour titre $titre n'à pas obtenue de réponse pour l'instant revenez plus tard.
                <br>
                <br>
            </h2>
        </div>
        " ;
    } else {
        echo "
        <div id='premier'>
            <h2 id='texte'>
                Votre candidature chez $entreprise avec pour titre $titre à été refusé.
                <br>
                <br>
            </h2>
        </div>
        " ;
    }
    
}
echo"
    <div id='premier'>
        <form action='home.php' method='post' >
            <button class='button'>Retour</button>
        </form>
    </div>
    ";
?>

    </body>
</html>