<?php
session_start();
  if(isset($_SESSION['id'])) {
  
      if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE users SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: index.php?page=profile&id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE users SET mdp = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: index.php?page=profil&id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "images/avatar/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $_SESSION['id'].".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location: index.php?page=profil&id='.$_SESSION['id']);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit �tre au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas d�passer 2Mo";
   }
}  
?>
   <div id="header">
    <div class="menu">
            <ul>
              <li class="logo"><img  src="images/logo.png"></li>
               <li ><a href="index.php?page=home">Accueil</a></li>
                <li><a href="index.php?page=cours-classe">Cours</a></li>
                <li><a href="">Exercices</a></li>
                <li><a href="index.php?page=forum">Forum</a></li>
                <li><a href="">Shop</a></li>
                <li><a href="index.php?page=profil&id=<?php echo $_SESSION['id'] ?>"><img src="images/avatar/<?php echo $_SESSION['avatar'] ?>" class="pphead"/></a></li>
                  <li><a href="index.php?page=logout.php">Deconnexion</a></li>
                 <li><a href="index.php?page=profil-edit&id=<?php echo $_SESSION['id'] ?>" class="active-link">Paramètres</a></li>
                <!-- <li><a href="index.php?page=login" class="buttonreglog">Connexion</a></li> -->
               <!-- <li><a href="register.html" class="buttonreglog">S'inscrire</a></li> -->
            </ul>
        </div>
</div>
<div id="content">
    <div class="profil-box">
        <div class="modif-info-profil-box">
            <table>
                <form method="POST" action="" enctype="multipart/form-data">
                <tr>
                    <td>Mail:</td><td><input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /></td>
                </tr>
                <tr>
                    <td>Mot de passe:</td>  <td><input type="password" name="newmdp1" placeholder="Mot de passe"/></td>
                </tr>
                <tr>
                    <td>confirmation de mot de passe:</td>  <td><input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /></td>
                </tr>
                 <tr>
                    <td>Changer de photo de profil:</td><td> <input type="file" name="avatar" /></td>
                </tr>
                <tr>
               <td> <input type="submit" value="Mettre à jour mon profil !" /></td>
                </tr>
                </form>
            </table>
               
            <?php if(isset($msg)) { echo $msg; } ?>
    </div>
</div>
</div>
<?php
  }else{
      Header('Location: index.php?page=login');
  }
?>