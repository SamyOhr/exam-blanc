<?php
$NOM = $_GET['nom'];

// connexion base de données 
$BASE = new PDO('mysql:host=localhost; dbname=id20205701_samy', 'id20205701_samyouicher', '/&*hX18M$A}2#QGr');
$BASE->exec("SET CHARACTER SET utf8");

$SQL = "INSERT INTO personne VALUES(NULL,'$NOM')";

$RESULT = $BASE->query($SQL);

if ($RESULT == false) { 
    echo '<span style="color:red"><strong>'.$NOM.'</strong> n\'a pas pu être ajouté dans la BDD.</span>'; 
} 
else {
    echo '<span style="color:green"><strong>'.$NOM.'</strong> a été ajouté dans la BDD.</span>';
}
?>
