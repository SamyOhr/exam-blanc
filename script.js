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
  
  // Si le nom est valide, on envoie la requête à la base de données
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/ajouter_nom", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send(JSON.stringify({"nom": nom_input}));
  
  document.getElementById('bouton').disabled = false;
}

function valider_longueur(nom) {
  return nom.length >= 2 && nom.length <= 20;
}

function valider_bdd(nom) {
  // On peut ajouter ici la validation de la base de données
  // Si le nom existe déjà, renvoyer false
  return true;
}

