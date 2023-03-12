<?php
session_start();
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
    <div class="forum-box1">
        <h1>Ecrire un nouveau Topic</h1>
        <a href="index.php?page=new-topic"><button>Ecrire un nouveau Topic</button></a>
        <br /><br />
    </div><br /><br />
    <div class="forum-box2">
        <div class="forcatandscat">
            <table class="tableauforum1">
                <tr class="thead">
                    <th>Sujet</th>
                    <th>Nombre de message</th>
                    <th>Création</th>
                </tr>
                <tr>
                    <?php 
            while($t = $topics->fetch()) {
        ?>
               <td><p><a href="index.php?page=topic&titre=<?=url_custom_encode($t['sujet'])?>&id=<?=$t['topic_base_id']?>"><?= $t['sujet']?></a></p></td>
               <td>15</td>
               <td><?= $t['date_heure_creation']?> par <?= $t['prenom']?></td>
                  <?php
            }
        ?>
                </tr>

            </table><br /><br /><br />
        </div>
    </div>
</div>
