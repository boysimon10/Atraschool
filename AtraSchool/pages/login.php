<?php
session_start();
if(isLogged() == 0){
 if(isset($_POST['formconnexion'])){
     $mailconnect = htmlspecialchars($_POST['mailconnect']);
     $mdpconnect = sha1($_POST['mdpconnect']);
     if(!empty($mailconnect) AND !empty($mdpconnect))
     {
         $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND mdp = ?");
         $requser->execute(array($mailconnect, $mdpconnect));
         $userexist = $requser->rowCount();
         
         if($userexist == 1){
             $userinfo = $requser->fetch();
             $_SESSION['id']= $userinfo['id'];
             $_SESSION['pseudo']= $userinfo['pseudo'];
             $_SESSION['prenom']= $userinfo['prenom'];
             $_SESSION['nom']= $userinfo['nom'];
             $_SESSION['mail']= $userinfo['mail'];
             $_SESSION['sexe']= $userinfo['sexe'];
             $_SESSION['jour']= $userinfo['jour'];
             $_SESSION['mois']= $userinfo['mois'];
             $_SESSION['annee']= $userinfo['annee'];
             $_SESSION['fonction']= $userinfo['fonction'];
             $_SESSION['matierensegn']= $userinfo['matierensegn'];
             $_SESSION['classe']= $userinfo['classe'];
             $_SESSION['region']= $userinfo['region'];
             $_SESSION['ecole']= $userinfo['ecole'];
             $_SESSION['avatar']= $userinfo['avatar'];
                 Header('Location: index.php?page=profil&id='.$_SESSION['id']);
                 
         }else{
             $erreur ="L'adresse email ou le mot de passe est incorrect";
         }
     }else{
         $erreur = "Tous les champs doivent etre completes";
     }
 }
?>
  <span class="backtohome"><a href="index.php?page=home"><button><i class="i-left"></i>Retour à l'accueil</button></a></span>
  <div id="boxlogin">
      <div class="boxtextlogin">
          <div class="logolog"><img src="images/logo.png" /></div>
<!--
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur consectetur consequuntur dolores
    ducimus eligendi eveniet expedita facere incidunt natus quam quibusdam quidem, repellat sed sunt tempore voluptatem?
    Eligendi, ipsa!</p>
-->
      </div>
       <div class="boxformlogin">
       <span class="titleboxform">Connectez-vous ici</span>
       <span class="errorlog"></span>
        <form method="POST" action="">
         <input type="email" name="mailconnect" placeholder="Enter Email"><br/><br/>
         <span class="i-input1"><i class="i-mail-alt"></i></span>
        <input type="password" name="mdpconnect" placeholder="••••••••••••"><br/><br/>
        <span class="i-input2"><i class="i-key"></i></span>
<!--        <input type="checkbox" value="Rester connecter"/>-->
        <button name="formconnexion" >Se connecter <i class="i-right"></i></button><br/><br/>
   <a href="#">Mot de passe oublié</a><br/><br/><a href="">S'inscrire</a>
			</form>
           <td><?php
            if(isset($erreur)){
                echo '<p color="#fff">' .$erreur."</p>";
            }
            ?></td>
      </div>
  </div>
  <?php 
}else{
    header('Location: index.php?page=profil&id='.$_SESSION['id']);
}
?>