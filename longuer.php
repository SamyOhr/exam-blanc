<?php
$NOM = $_GET['nom'];
$MESSAGE_RETOUR = '';
$BONNES_CONDITIONS = false;
if (strlen($NOM) < 2){
    $MESSAGE_RETOUR = '<span style="color:red"><strong>'.$NOM .'</strong> : Ce pseudo est trop court.</span>';
} else if (strlen($NOM) > 10) {
    $MESSAGE_RETOUR = '<span style="color:red"><strong>'.$NAME .'</strong> : Ce pseudo est trop long.</span>';
} else {
    $BONNES_CONDITIONS = true;
}
$REPONSE = array(
    'est_valide' => $BONNES_CONDITIONS,
    'message' => $MESSAGE_RETOUR,
);
echo json_encode($REPONSE);
?>