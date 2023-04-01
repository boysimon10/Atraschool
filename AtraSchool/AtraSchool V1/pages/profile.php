<?php
session_start();
   if(isset($_GET['id']) AND $_GET['id']>0){
        $getid = intval($_GET['id']);
        $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
    if(isset($_SESSION['id'])) {
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
              <a class="nav-link" href="#ressources">Ressources</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-sign-up" href=""><i class="fa-solid fa-bell"></i></a>
            </li>
            <li class="nav-item btn-sign-in">
              <a class="nav-link" href="index.php?page=setting&id=<?php echo $_SESSION['id'] ?>"><i class="fa-sharp fa-solid fa-gear"></i></i></a>
            </li>
            <li class="nav-item dropdown">
              <a type="button" class="nav-link dropbtn" href=""><i class="fa-solid fa-user"></i></a>
              <div class="dropdown-content">
                <a href="index.php?page=setting&id=<?php echo $_SESSION['id'] ?>">Paramètres du compte </a>
                <a href="index.php?page=logout">Déconnexion</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </section>

  <section id="home-presentation">
    <div id="testimonials"><img class="testimonial-img" src="images/avatar/<?php echo $_SESSION['avatar'] ?>" alt="dog-profile"></div>
    <div class="row">
      <div class="text-presentation ">
        <h2>Content de vous retouver @<?php echo $_SESSION['username'] ?></h2>
        <p>Vous puvez reprendre où vous en étiez, ou consulter les nouveautés.</p>
      </div>
      
    </div>
  </section>

   <!-- cours -->
   <section id="ressources">
    <div class="row card-group-course">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card" style="width: 18rem;">
          <div class="container-img-card-course">
            <img src="images/school.png" class="card-img-top" alt="school-img">
          </div>

          <div class="card-body">
            <h5 class="card-title">Collège</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="">Sixième - 6e </a></li>
            <li class="list-group-item"><a href="#">Cinquième - 5e </a></li>
            <li class="list-group-item"><a href="#">Quatrième - 4e </a></li>
            <li class="list-group-item"><a href="#">Troisième - 3e </a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card " style="width: 18rem;">
          <div class="container-img-card-course">
            <img src="images/graduation-hat.png" class="card-img-top" alt="graduation-hat-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">Lycée</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="#">Seconde - 2nde </a></li>
            <li class="list-group-item"><a href="#">Première - 1ère </a></li>
            <li class="list-group-item"><a href="Tle.html">Terminale - Tle </a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card " style="width: 18rem;">
          <div class="container-img-card-course">
            <img src="images/education.png" class="card-img-top" alt="education-card-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">Pus ...</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="#">Informatique </a></li>
            <li class="list-group-item"><a href="#">Gestion financière</a></li>
            <li class="list-group-item"><a href="#">Entrepreneuriat</a></li>
          </ul>
        </div>
      </div>

    </div>
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
           Header('Location: index.php?page=signin');
       }
  }else{
      Header('Location: index.php?page=home');
  }
?>