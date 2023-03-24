<?php
$NOM = $_GET['nom'];

// Connexion à la base de données 
$BASE = new PDO('mysql:host=localhost; dbname=id20205701_samy', 'id20205701_samyouicher', '/&*hX18M$A}2#QGr');
$BASE->exec("SET CHARACTER SET utf8");

// Requête pour vérifier si le nom est déjà dans la base de données
$SQL = "SELECT * FROM users WHERE nom=:nom";
$requete = $BASE->prepare($SQL);
$requete->execute(array(':nom' => $NOM));
$resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

if (count($resultat) == 0) {     
    $PEUT_INSERER = true;
    $MESSAGE_RETOUR = '<span style="color:green"><strong>'.$NOM.'</strong> : Ce pseudo est libre. </span>'; 
} else {
    $PEUT_INSERER = false;
    $MESSAGE_RETOUR = '<span style="color:red"><strong>'.$NOM.'</strong>: Ce pseudo est déjà pris.</span>';
}

$REPONSE = array(
    'peut_inserer' => $PEUT_INSERER,
    'message' => $MESSAGE_RETOUR,
);

echo json_encode($REPONSE);
?>

