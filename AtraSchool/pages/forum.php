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
                    <th> </th>
                    <th>Categories</th>
                    <th>Sous categories</th>
                </tr>
                <tr>
                    <?php 
        while($c = $categories->fetch()){
         $subcat -> execute(array($c['id']));
    $subcat->execute(array($c['id']));
      $souscategories = '';
      while($sc = $subcat->fetch()) { 
         $souscategories .= '<a href="index.php?page=forum_topics&categorie='.url_custom_encode($c['nom']).'&souscategorie='.url_custom_encode($sc['nom']).'" class="souscatlink" >'.$sc['nom'].'</a> | ';
      }
      $souscategories = substr($souscategories, 0, -3);
        ?>

                    <td><img src="images/<?= $c['nom']?>.png" class="imgcategorie" /></td>
                    <td class="categorie"><a href="index.php?page=forum_topics&categorie=<?= url_custom_encode($c['nom']) ?>"><?= $c['nom']?></a></td>
                    <td>
                        <p><?= $souscategories ?></p>
                    </td>
                </tr>
                <?php 
        }
        ?>
                <!--  <tr>
             <td><img src="images/Sciences.png" class="imgcategorie" /></td>
            <td class="categorie"><a href="">Sciences</a></td>
             <td>Mathematiques | SVT | Sciences physiques | Eco-Fam</td>
         </tr>  
         <tr>
             <td><img src="images/Autres.png" class="imgcategorie" /></td>
             <td class="categorie"><a href="">Sciences humaines et autres</a></td>
             <td>Histoire | Geographie | Education Civique | Philosophie | Economie | Musique</td>
         </tr>   -->
            </table><br /><br /><br />
        </div>
    </div>
</div>
