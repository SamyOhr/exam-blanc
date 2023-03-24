<?php
$NAME = $_GET['nom'];

$MESSAGE_RETOUR = '';
$PEUT_INSERER = false;
    // connexion baseee de données 
    
$BASE = new PDO('mysql:host=localhost; dbname=id20205701_samy', 'id20205701_samyouicher', '/&*hX18M$A}2#QGr');
$BASE->exec("SET CHARACTER SET utf8");

$SQL = "SELECT * FROM personne WHERE nom='$NOM'";

$RESULT = $BASE->query($SQL);

    if ($RESULT->rowCount() == 0) {     
        $MESSAGE_RETOUR = '<span style="color:green"><strong>'.$NOM.'</strong> : Ce pseudo est libre. </span>'; 
        $PEUT_INSERER = true;
    } else {
        $MESSAGE_RETOUR = '<span style="color:red"><strong>'.$NOM.'</strong>: Ce pseudo est déjà pris.</span>';

    }

$REPONSE = array(
    'peut_inserer' => $PEUT_INSERER,
    'message' => $MESSAGE_RETOUR,
);
    
echo json_encode($REPONSE);

?>