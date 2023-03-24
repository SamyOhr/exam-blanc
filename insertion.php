<?php
$NOM = $_GET['nom'];

// conneexionn baseee de données 
$base = new PDO('mysql:host=localhost; dbname=id20205717_noms', 'id20205717_najd', '0$62q}/Fw])IOlry');

$base->exec("SET CHARACTER SET utf8");

$sql = "INSERT INTO personne VALUES(NULL,'$NOM')";

$result = $base->query($sql);

if ($result == false) { 
    echo '<span style="color:red"><strong>'.$NOM.'</strong> n\'a pas pu être ajouté dans la BDD.</span>'; 
} 
else {
    echo '<span style="color:green"><strong>'.$NOM.'</strong> a été ajouté dans la BDD.</span>';
}
    

?>