 <?php
session_start();
?>
<div id="header">
    <div class="menu">
       <!-- <button class="burgermenu">
            <i class="i-menu"></i>
        </button> -->
        <ul class="nav-menu">
            <li class="logo"><img src="images/logo.png"></li>
            <li><a href="index.php?page=home" class="active-link">Accueil</a></li>
            <li><a href="index.php?page=cours-classe">Cours</a></li>
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
    <div class="banner">
        <div class="app-text">
            <h1>Apprendre Facilement <br> et rapidement</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque augue sed accumsan finibus. <br>Vivamus quis sodales leo, sit amet condimentum dui.<br> Curabitur rhoncus odio neque, id tempor urna aliquam sed. Nullam non enim mauris.
            </p>
            <?php 
            if(isLogged() == 1)
          {
            ?>
            <?php 
          } else{ 
          ?>
            <div class="app-logregister">
                <a href="index.php?page=register"><button>S'inscrire</button></a>
                <a href="index.php?page=login"><button>Se connecter</button></a>
            </div>
            <?php 
              }
            ?>
        </div>
        <div class="app-picture">
            <img src="images/albert einstein.png" />
        </div>
    </div>
    <div class="section">
        <div class="section-app">
            <h2>Lorem Ipsum</h2>
            <p>Nam lobortis efficitur lectus in iaculis. Vestibulum magna metus, bibendum ac pellentesque eu, volutpat nec ex. Praesent id diam id turpis dictum hendrerit et nec nisi. Mauris in sodales massa. Vivamus sed risus et turpis lacinia dapibus.</p>
        </div>
        <div class="section-app">
            <h2>Lorem Ipsum</h2>
            <p>Nam lobortis efficitur lectus in iaculis. Vestibulum magna metus, bibendum ac pellentesque eu, volutpat nec ex. Praesent id diam id turpis dictum hendrerit et nec nisi. Mauris in sodales massa. Vivamus sed risus et turpis lacinia dapibus.</p>
        </div>
        <div class="section-app">
            <h2>Lorem Ipsum</h2>
            <p>Nam lobortis efficitur lectus in iaculis. Vestibulum magna metus, bibendum ac pellentesque eu, volutpat nec ex. Praesent id diam id turpis dictum hendrerit et nec nisi. Mauris in sodales massa. Vivamus sed risus et turpis lacinia dapibus.</p>
        </div>
        <div class="section-app">
            <h2>Lorem Ipsum</h2>
            <p>Nam lobortis efficitur lectus in iaculis. Vestibulum magna metus, bibendum ac pellentesque eu, volutpat nec ex. Praesent id diam id turpis dictum hendrerit et nec nisi. Mauris in sodales massa. Vivamus sed risus et turpis lacinia dapibus.</p>
        </div>
        <div class="section-app">
            <h2>Lorem Ipsum</h2>
            <p>Nam lobortis efficitur lectus in iaculis. Vestibulum magna metus, bibendum ac pellentesque eu, volutpat nec ex. Praesent id diam id turpis dictum hendrerit et nec nisi. Mauris in sodales massa. Vivamus sed risus et turpis lacinia dapibus.</p>
        </div>
        <div class="section-app">
            <h2>Lorem Ipsum</h2>
            <p>Nam lobortis efficitur lectus in iaculis. Vestibulum magna metus, bibendum ac pellentesque eu, volutpat nec ex. Praesent id diam id turpis dictum hendrerit et nec nisi. Mauris in sodales massa. Vivamus sed risus et turpis lacinia dapibus.</p>
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
