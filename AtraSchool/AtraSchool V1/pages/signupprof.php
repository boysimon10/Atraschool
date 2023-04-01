<?php
session_start();
    if(isLogged() == 1){
          header('Location: index.php?page=profile&id='.$_SESSION['id']);
    }
if(isset($_POST['forminscription']))
{ 
    $username = htmlspecialchars(trim($_POST['username']));
    $mail = htmlspecialchars(trim($_POST['mail']));
    $mdp = sha1(trim($_POST['mdp']));
    $mdp2 = sha1(trim($_POST['mdp2']));
    $matierensegn = htmlspecialchars($_POST['matierensegn']);
    $fonction = "Professeur";
    $avatar = "defaut.png";
    
    if(!empty($_POST['username']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['classe']))
    {  
      $usernamelength = strlen($username);
      if($usernamelength <=26)
      {
        $requsername= $bdd->prepare("SELECT * FROM users WHERE username=?");
        $requsername->execute(array($username));
        $usernameexist = $requsername->rowCount();
        if($usernameexist == 0){
          if($mdp == $mdp2){
                  $reqmail= $bdd->prepare("SELECT * FROM users WHERE mail=?");
                  $reqmail->execute(array($mail));
                  $mailexist = $reqmail->rowCount();
                  if($mailexist == 0){
                      
                  $insertmbr =$bdd->prepare("INSERT INTO users(username,mail,mdp,matierensegn,fonction,avatar)VALUES(?,?,?,?,?,?)");
                  $insertmbr->execute(array($username,$mail,$mdp,$matierensegn,$fonction,$avatar));
                        Header('Location: index.php?page=signin');
            
                  }else{
                      $erreur ="Adresse Mail non valide";
                  }
            }else{
                    $erreur ="Les deux mots de passe ne correspondent pas";
                }
              }else{
                $erreur ="Nom d'utulisateur non valide";
              }
      }else{
          $erreur ="Nom d'utulisateur trop long";
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
        <a class="navbar-brand" href="index.php?page=home"><img class="brand" src="images/logo.png" alt="atraschool-logo"></a>
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

  <!-- sign-up -->
  <section id="sign-up">
  <form  method="POST" action="">
    <h2 style="margin-bottom: 5%;"><i class="fa-solid fa-user-plus"></i> Inscription </h2>
    <div class="row choice-bloc">
      <h4 class="col-lg-6 choice"> <a href="index.php?page=signupeleve">Eleve</a></h4>
      <h4 class="col-lg-6 choice sign-up-choice"><a href="index.php?page=signupprof">Professeur</a></h4>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Nom D'utulisateur">
      <label for="floatingInput">Nom D'utulisateur</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInput" name="mail" placeholder="name@example.com">
      <label for="floatingInput">Adresse e-mail</label>
    </div>
    <div style="margin-bottom: 4%;" class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="mdp" placeholder="Password">
      <label for="floatingPassword">Mot de passe</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" name="mdp2" placeholder="Password">
      <label for="floatingPassword">Confirmer mot de passe</label>
    </div>
    <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="matierensegn">
                 <option selected>Matière</option>
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
            </select>
    </div>

    <div class="rest-connect">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Accepter les <a href="">conditions d'utilisation</a>
        </label>
      </div>
      <button name="forminscription" class="btn btn-primary btn-connect">S'inscrire</button>
    </div>
    <div><?php
            if(isset($erreur)){
                echo '<p color="red">' .$erreur."</p>";
            }
            ?></div>
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