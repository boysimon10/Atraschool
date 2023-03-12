<?php
session_start();
  if(isset($_GET['id']) AND $_GET['id']>0){
      $getid = intval($_GET['id']);
      $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
      $requser->execute(array($getid));
      $userinfo = $requser->fetch();
       if(isset($_SESSION['id'])) {
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
                 <li><img src="images/avatar/<?php echo $_SESSION['avatar'] ?>" class="pphead"/></li>
                 <li><a href="index.php?page=logout.php">Deconnexion</a></li>
                 <li><a href="index.php?page=profil-edit&id=<?php echo $_SESSION['id'] ?>">Paramètres</a></li>
                <!-- <li><a href="index.php?page=login" class="buttonreglog">Connexion</a></li> -->
               <!-- <li><a href="register.html" class="buttonreglog">S'inscrire</a></li> -->
            </ul>
        </div>
</div>
<div id="content">
    <div class="profil-box">
        <div class="profil-cover-box">
            <img src="images/cover.jpg" />
            <div class="pp-box">
                <img src="images/avatar/<?php echo $_SESSION['avatar'] ?>" />
            </div>
            <div class="name-pp-box">
                <h2><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></h2>
            </div>
        </div>
        <div class="info-profil-box">
            <table>
                <tr>
                    <td>Prénom:</td><td><?php echo $_SESSION['prenom'] ?></td>
                </tr>
                <tr>
                    <td>Nom:</td>  <td><?php echo $_SESSION['nom'] ?></td>
                </tr>
                 <tr>
                    <td>École:</td><td><?php echo $_SESSION['ecole'] ?></td>
                </tr>
                <tr>
                    <td>Classe:</td><td><?php echo $_SESSION['classe'] ?></td>
                </tr>
            </table>
            
        </div>
    </div>
</div>
<?php
       }else{
           Header('Location: index.php?page=login');
       }
  }else{
      Header('Location: index.php?page=home');
  }
?>