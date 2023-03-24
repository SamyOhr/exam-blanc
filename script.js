var nom = document.getElementById('nom');
nom.addEventListener("input", valider_nom);

function valider_nom() {
  var nom_input = nom.value.trim(); // Enlever les espaces en début et fin de chaîne
  var est_de_bonne_longueur = valider_longueur(nom_input);
  if (est_de_bonne_longueur == false) {
    desactiver_bouton_envoi(); // Utiliser une fonction séparée pour désactiver le bouton
    return;
  }
  
  var peut_inserer = valider_bdd(nom_input);
  if (peut_inserer == false) {
    desactiver_bouton_envoi(); // Utiliser une fonction séparée pour désactiver le bouton
    return;
  }

  activer_bouton_envoi(); // Utiliser une fonction séparée pour activer le bouton
}

function valider_longueur(nom){
  var req = new XMLHttpRequest();
  req.open("GET","verifier_longueur.php?nom="+nom,false);
  req.send(null);
  
  var reponse = JSON.parse(req.responseText);
  document.getElementById('response').innerHTML = reponse.message;

  return reponse.est_valide;
}

function valider_bdd(nom){
  var req = new XMLHttpRequest();
  req.open("GET","dans_bdd.php?nom="+nom,false);
  req.send(null);

  var reponse = JSON.parse(req.responseText);
  document.getElementById('response').innerHTML = reponse.message;

  return reponse.peut_inserer;
}

function envoi_serveur(){
  var nom_input = document.getElementById('nom').value.trim(); // Enlever les espaces en début et fin de chaîne
  var req= new XMLHttpRequest();
  req.open("GET","insertion.php?nom="+nom_input,false); 
  req.send(null); 
  document.getElementById('response').innerHTML = req.responseText;
  desactiver_bouton_envoi(); // Utiliser une fonction séparée pour désactiver le bouton
  nom.value="";
}

function desactiver_bouton_envoi() {
  document.getElementById('bouton').disabled = true;
}

function activer_bouton_envoi() {
  document.getElementById('bouton').disabled = false;
}

var bouton = document.getElementById('bouton');
bouton.addEventListener("click", envoi_serveur);

