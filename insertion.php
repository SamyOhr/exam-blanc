<?php
$NAME = $_GET['nom'];

// conneexionn baseee de données 
$BASE = new PDO('mysql:host=localhost; dbname=id20205701_samy', 'id20205701_samyouicher', '/&*hX18M$A}2#QGr');

$base->exec("SET CHARACTER SET utf8");

$sql = "INSERT INTO personne VALUES(NULL,'$NAME')";

$result = $base->query($sql);

if ($result == false) { 
    echo '<span style="color:red"><strong>'.$NAME.'</strong> n\'a pas pu être ajouté dans la BDD.</span>'; 
} 
else {
    echo '<span style="color:green"><strong>'.$NAME.'</strong> a été ajouté dans la BDD.</span>';
}
    

?>

