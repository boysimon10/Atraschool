<?php
session_start();
if(isset($_SESSION['id'])) {
  
?>
 <!-- Top -->
 <section id="top">
    <div class="top-navbar">

      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="profil.html"><img class="brand" src="images/logo.png" alt="atraschool-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="profil.html">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#ressources">Ressources</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-sign-up" href="sign-up.html"><i class="fa-solid fa-bell"></i></a>
            </li>
            <li class="nav-item btn-sign-in">
              <a class="nav-link" href="sign-in.html"><i class="fa-sharp fa-solid fa-gear"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a type="button" class="nav-link dropbtn" href=""><i class="fa-solid fa-user"></i></a>
              <div class="dropdown-content">
                <a href="settings">Paramètres du compte </a>
                <a href="#">Déconnexion</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </section>

  <section id="nav-vertical">
    <div class="row">
      <div class="settings-bar col-lg-3">
        <ul>
          <li><i class="fa-solid fa-user"></i> Votre compte</li>
          <li><i class="fa-solid fa-lock"></i> Connexion et sécurité</li>
        </ul>
      </div>
      <div class="col-lg-9" col-lg-9>
         <script type="text/javascript">
          function fAddinput(){
            document.getElementbyId('settingusername').innerHTML ='<input type="text" name="mailconnect" placeholder="@<?php echo $_SESSION['username'] ?>"><button name="" class="btn btn-primary btn-connect">Valider</button>';
          }
         </script>
        <div id="connexion-security">
          <h4>Votre Compte</h4>
          <div class="set-nom">
            <h5>Nom D'utulisateur</h5>
            <p>@<?php echo $_SESSION['username'] ?></p>
            <button class="btn btn-primary" onclick="fAddinput()">Modifier</button>
            <div id="settingusername"></div>
          </div>
          <hr>
         <!-- Top   <div class="set-prenom">
            <h5>Nom</h5>
            <p>Aly THIAM</p>
            <button type="button" class="btn btn-primary">Modifier</button>
          </div>--> 
          <hr>
          <div class="set-email">
            <h5>Adresse email</h5>
            <p>@<?php echo $_SESSION['mail'] ?></p>
            <button type="button" class="btn btn-primary">Modifier</button>
          </div>
          <hr>
          <div class="set-password">
            <h5>Mot de passe</h5>
            <button type="button" class="btn btn-primary">Modifier</button>
          </div>
        </div>
        
        <div id="profil-settings">
          <h4>Connexion et sécurité</h4>
          <div class=""></div>
          <div class=""></div>
          <div class=""></div>
          <div class=""></div>
        </div>
        
      </div>
    </div>

  </section>
<?php
  }else{
      Header('Location: index.php?page=signin');
  }
?>