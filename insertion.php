<?php
$nom = $_GET['nom'];

// Connexion à la base de données
$base = new PDO('mysql:host=localhost;dbname=id20205701_samy;charset=utf8', 'id20205701_samyouicher', '/&*hX18M$A}2#QGr');

// Préparation de la requête d'insertion
$sql = "INSERT INTO personne (nom) VALUES (:nom)";
$stmt = $base->prepare($sql);
$stmt->bindParam(':nom', $nom);

// Exécution de la requête
if ($stmt->execute()) {
    echo '<span style="color:green"><strong>'.$nom.'</strong> a été ajouté dans la BDD.</span>';
} else {
    echo '<span style="color:red"><strong>'.$nom.'</strong> n\'a pas pu être ajouté dans la BDD.</span>';
}
?>
