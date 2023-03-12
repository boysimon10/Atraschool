 <?php 
session_start();
?>
 <div id="header">
     <div class="menu">
         <ul>
             <li class="logo"><img src="images/logo.png"></li>
             <li><a href="index.php?page=home">Accueil</a></li>
             <li><a href="index.php?page=cours-classe" class="active-link">Cours</a></li>
             <li><a href="">Exercices</a></li>
             <li><a href="index.php?page=forum">Forum</a></li>
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
     <div class="av-section-classe">
         <h1>Tout le programme scolaire pour réussir de la 6eme à la Terminale</h1>
         <img src="images/albert einstein.png" />
     </div>
     <div class="section-classe">
         <div class="section-niveau">
             <h2>College</h2>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>6eme</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>5eme</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>4eme</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>3eme</h3>
                 </div>
             </a>
         </div>
         <div class="section-niveau">
             <h2>Lycée</h2>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Seconde S</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Seconde L</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Premiere S1</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Premiere S2</h3>
                 </div>
             </a><br>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Premiere L1</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Premiere L2</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Premiere L'</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Terminale S1</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Terminale S2</h3>
                 </div>
             </a><br>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Terminale L1</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Terminale L2</h3>
                 </div>
             </a>
             <a href="">
                 <div class="box-classe">
                     <img src="images/idea.png" />
                     <h3>Terminale L'</h3>
                 </div>
             </a>
         </div>
     </div>
 </div>
 <div id="footer">
     <div class="footer-app">
         <ul>
             <li><a href=""><i class="i-facebook-squared"></i></a></li>
             <li><a href=""><i class="i-instagram"></i></a></li>
             <li><a href=""><i class="i-twitter"></i></a></li>
             <li><a href=""><i class="i-youtube-play"></i></a></li>
             <li><a href=""><i class="i-telegram"></i></a></li>
             <li><a href=""><i class="i-whatsapp"></i></a></li>
         </ul>
     </div><br>
     <span>
         <hr color="#307FE2"></span>
     <span class="foot-app">
         <p> © 2020 AtraSchool | Tous droits réservés</p>
     </span>
 </div>
