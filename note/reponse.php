<?php

session_start();

require('PDO.php');
$pdo = bddConnect();

$PostulatID = $_POST['PostulatID'];

if($_POST['reponse']=="OUI"){

    $query = $pdo->prepare("UPDATE postulat SET Accepter = 'OUI' WHERE PostulatID = :PostulatID");
    $query->execute(array('PostulatID' => $PostulatID));
    header('Location: home.php');


} else {

    $query = $pdo->prepare("UPDATE postulat SET Accepter = 'NON' WHERE PostulatID = :PostulatID");
    $query->execute(array('PostulatID' => $PostulatID));
    header('Location: home.php');


}

?>