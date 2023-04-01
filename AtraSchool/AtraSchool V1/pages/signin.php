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
            $_SESSION['username']= $userinfo['username'];
            $_SESSION['fonction']= $userinfo['fonction'];
            $_SESSION['mail']= $userinfo['mail'];
            $_SESSION['matierensegn']= $userinfo['matierensegn'];
            $_SESSION['classe']= $userinfo['classe'];
            $_SESSION['avatar']= $userinfo['avatar'];
                Header('Location: index.php?page=profile&id='.$_SESSION['id']);
                
        }else{
            $erreur ="L'adresse email ou le mot de passe est incorrect";
        }
    }else{
        $erreur = "Tous les champs doivent etre completes";
    }
}
?>
<!-- Top -->
<section id="top">
    <div class="top-navbar">

      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img class="brand" src="images/logo.png" alt="atraschool-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=home">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Cours</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Exercices</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-sign-up" href="index.php?page=signupeleve"><i class="fa-solid fa-user-plus"></i></a>
            </li>
            <li class="nav-item btn-sign-in">
              <a class="nav-link" href="index.php?page=signin"><i class="fa-solid fa-right-to-bracket"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </section>

  <!-- sign-in -->
  <section id="sign-in">
    <h2 style="margin-bottom:5%; color:#212529;"><i class="fa-solid fa-right-to-bracket"></i> Connexion</h2>
  <form method="POST" action="">
    <div class="form-floating mb-3">
      <input type="email" name="mailconnect" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Adresse e-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" name="mdpconnect" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Mot de passe</label>
    </div>
    <div class="rest-connect">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Se souvenir de moi
        </label>
      </div>
      <button name="formconnexion" class="btn btn-primary btn-connect">Se connecter</button>
      <div class="row">
        <div class="col-lg-6">
          <p>Nouveau ? <a href="index.php?page=signupeleve">S'inscrire</a></p>
        </div>
        <div><?php
            if(isset($erreur)){
                echo '<p color="#fff">' .$erreur."</p>";
            }
            ?></div>
        <div class="col-lg-6">
          <a href="">Mot de passe oublié ?</a>
        </div>
      </div>
    </div>
    </form>
  </section>


  <!-- footer -->
  <section id="footer">
    <div class="row">
      <div class="social-media col-lg-6">
        <h5>Nos réseaux sociaux</h5>
        <p><a href="#"><i class="fa-brands fa-instagram fa-footer"></i> instagram</a></p>
        <p><a href="#"><i class="fa-brands fa-youtube"></i> youtube</a></p>
        <!--<a href="index.html"><img class="footer-brand brand" src="images/logo.png" alt=""></a>-->
      </div>
      <div class="contacts col-lg-6">
        <h5>Nos contacts</h5>
        <p>Si vous avez des questions, une signalisation, ou une quelque chose d'autre </p>
        <p><a href="mailto:atraschool@gmail.com?subject=feedback"><i class="fa-solid fa-envelope fa-footer"></i> Nous contacter</a></p>
        <p class="copyright-text">© 2022 Atraschool | Tous droits réservés </p>
      </div>
    </div>
  </section>
<?php
    }else{
           header('Location: index.php?page=profile&id='.$_SESSION['id']);
}
?>