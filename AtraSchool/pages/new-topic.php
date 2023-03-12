<?php
session_start();
if(isLogged() == 1){
    if(isset($_POST['tsubmit'])) {
      if(isset($_POST['tsujet'],$_POST['tcontenu'])) {
         $sujet = htmlspecialchars($_POST['tsujet']);
         $contenu = htmlspecialchars($_POST['tcontenu']);
         if(!empty($sujet) AND !empty($contenu)) {
            if(strlen($sujet) <= 70) {
               if(isset($_POST['tmail'])) {
                  $notif_mail = 1;
               } else {
                  $notif_mail = 0;
               }
               $ins = $bdd->prepare('INSERT INTO f_topics (id_createur, sujet, contenu, notif_createur, date_heure_creation) VALUES(?,?,?,?,NOW())');
               $ins->execute(array($_SESSION['id'],$sujet,$contenu,$notif_mail));
                Header("Location: index.php?page=forum");
            } else {
               $terror = "Votre sujet ne peut pas dépasser 70 caractères";
            }
         } else {
            $terror = "Veuillez compléter tous les champs";
         }
      }
   }
    ?>
<div id="header">
    <div class="menu">
        <ul>
            <li class="logo"><img src="images/logo.png"></li>
            <li><a href="index.php?page=home">Accueil</a></li>
            <li><a href="index.php?page=cours-classe">Cours</a></li>
            <li><a href="">Exercices</a></li>
            <li><a href="index.php?page=forum" class="active-link">Forum</a></li>
            <li><a href="">Shop</a></li>
            <?php 
            if(isLogged() == 1)
          {
            ?>
            <li><a href="index.php?page=profil&id=<?php echo $_SESSION['id'] ?>"><img src="images/avatar/<?php echo $_SESSION['avatar'] ?>" class="pphead" /></a></li>
            <li><a href="index.php?page=logout.php">Deconnexion</a></li>
            <li><a href="index.php?page=profil-edit&id=<?php echo $_SESSION['id'] ?>">Paramètres</a></li>
            <?php 
          } else{ 
          ?>
            <li><a href="index.php?page=login" class="buttonreglog">Connexion</a></li>
            <!-- <li><a href="register.html" class="buttonreglog">S'inscrire</a></li> -->
            <?php 
              }
            ?>
        </ul>
    </div>
</div>
<div id="content">
    <div class="newtopix-box">
        <div class="formtopic">
            <h2>Ecrire un nouveau topic</h2>
            <form method="POST" action="">
                <label>Sujet:</label>
                <input type="text" placeholder="Sujet" name="tsujet" size="70" maxlength="70" /><br /><br />
                <label>Matière concernée:</label>
                <select name="tmatiere">
                    <option value="Francais">Francais</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Espagnol">Espagnol</option>
                    <option value="Allemagne">Allemagne</option>
                    <option value="Latin/Grec">Latin/Grec</option>
                    <option value="Portugais">Portugais</option>
                    <option value="Mathématiques">Mathématiques</option>
                    <option value="SVT">SVT</option>
                    <option value="PC">PC</option>
                    <option value="Histoire/Geographie">Histoire/Geographie</option>
                    <option value="Ecofam">Ecofam</option>
                    <option value="Economie">Economie</option>
                    <option value="Philosophie">Philosophie</option>
                    <option value="Musique">Musique</option>
                </select><br/><br/>
              <!--  <label>Niveau:</label>
              <select name="tniveau">
                 <option value="6eme">6éme</option>
                 <option value="5eme">5éme</option>
                 <option value="4eme">4éme</option>
                 <option value="3eme">3éme</option>
                 <option value="Seconde L">Seconde L</option>
                 <option value="Seconde S">Seconde S</option>
                 <option value="Première S1">Première S1</option>
                 <option value="Première S2">Première S2</option>
                 <option value="Première L1">Première L1</option>
                 <option value="Première L2">Première L2</option>
                 <option value="Première L'">Première L'</option>
                 <option value="Terminale S1">Terminale S1</option>
                 <option value="Terminale S2">Terminale S2</option>
                 <option value="Terminale L1">Terminale L1</option>
                 <option value="Terminale L2">Terminale L2</option>
                 <option value="Terminale L'">Terminale L'</option>
              </select> <br/><br/> -->
                <textarea placeholder="Ecrivez votre message" name="tcontenu"></textarea><br /><br />
                <input type="checkbox" name="tmail" /><label>Recevoir des notifications</label><br /><br />
                <button name="tsubmit">Publier</button>
                <?php
                if(isset($terror)){
                echo $terror;
            }
            ?>
            </form>
        </div>
    </div>
</div><br /><br />
<?php   
   }else{
 Header('Location: index.php?page=login');        
    }
?>
