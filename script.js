var nom = document.getElementById('nom');
nom.addEventListener("input", valider_nom);

function valider_nom() {
  var nom_input = nom.value;
  var est_de_bonne_longueur = valider_longueur(nom_input);
  if (est_de_bonne_longueur == false) {
    document.getElementById('bouton').disabled = true;
    return;
  }
  
  var peut_inserer = valider_bdd(nom_input);
  if (peut_inserer == false) {
    document.getElementById('bouton').disabled = true;
    return;
  }

  document.getElementById('bouton').disabled = false;
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
  var nom_input = document.getElementById('nom').value;
  var req= new XMLHttpRequest();
  req.open("GET","insertion.php?nom="+nom_input,false); 
  req.send(null); 
  document.getElementById('response').innerHTML = req.responseText;
  document.getElementById('bouton').disabled = true;
  nom.value="";
}
