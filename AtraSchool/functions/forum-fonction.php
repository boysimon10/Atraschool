<?php
  function get_prenom($id) {
   global $bdd;
   $prenom = $bdd->prepare('SELECT prenom FROM users WHERE id = ?');
   $prenom->execute(array($id));
   $prenom = $prenom->fetch()['prenom'];
   return $prenom;
}
  function get_nom($id) {
   global $bdd;
   $nom = $bdd->prepare('SELECT nom FROM users WHERE id = ?');
   $nom->execute(array($id));
   $nom = $nom->fetch()['nom'];
   return $nom;
}
  function get_avatar($id) {
   global $bdd;
   $avatar = $bdd->prepare('SELECT avatar FROM users WHERE id = ?');
   $avatar->execute(array($id));
   $avatar = $avatar->fetch()['avatar'];
   return $avatar;
}

