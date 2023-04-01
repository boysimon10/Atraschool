<?php 
session_start();

            if(isLogged() == 0)
          {
            ?>
<!-- Top -->
<section id="top">
    <div class="top-navbar">

      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.html"><img class="brand" src="images/logo.png" alt="atraschool-logo"></a>
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
          <?php 
          } else{ 
          ?>
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
                <a href="index.php?page=profile&id=<?php echo $_SESSION['id'] ?>">@<?php echo $_SESSION['username'] ?></a>
                <a href="index.php?page=setting&id=<?php echo $_SESSION['id'] ?>">Paramètres du compte</a>
                <a href="index.php?page=logout">Déconnexion</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </section>
           <?php 
              }
            ?>

  <!--<embed src="documents/h-l1-tle.pdf" width="80%"  height="50%" type='application/pdf'/>-->
  <!-- home presentation -->
  <section id="home-presentation">
    <div class="row">
      <div class="text-presentation col-lg-6">
        <h1>Apprendre facilement et rapidement</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at vehicula leo.
          Ut lobortis, ipsum a iaculis mollis, eros dui maximus velit, in luctus nunc mi quis arcu.
          Aliquam sed ex pharetra, feugiat eros nec, euismod sem. Curabitur sed lacinia velit. Lorem
          ipsum dolor sit amet, consectetur adipiscing elit..</p>
      </div>
      <div class="mascotte-block col-lg-6">
        <img class="mascotte-einstein" src="images/mascotte-einstein.png" alt="mascotte-einstein">
      </div>
    </div>
  </section>

  <!-- features -->
  <section id="features">
    <div class="row ft-row">
      <div class="col-lg-4 ft-col-lg-4">
        <i class="fa-solid fa-circle-check ft-icons fa-4px"></i>
        <h3>Easy to use.</h3>
        <p>So easy to use, even your dog could do it.</p>
      </div>
      <div class="col-lg-4  ft-col-lg-4">
        <i class="fa-solid fa-bullseye ft-icons fa-4px"></i>
        <h3>Elite Clientele</h3>
        <p>We have all the dogs, the greatest dogs.</p>
      </div>
      <div class="col-lg-4  ft-col-lg-4 fa-4px">
        <i class="fa-solid fa-heart ft-icons"></i>
        <h3>Guaranteed to work.</h3>
        <p>Find the love of your dog's life or your money back.</p>
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
            <li class="list-group-item"><a href="2nde.html">Seconde - 2nde </a></li>
            <li class="list-group-item"><a href="1ere.html">Première - 1ère </a></li>
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

  <!-- exercices -->
  <section id="exercices">

  </section>


  <!-- testimonials -->
  <section id="testimonials">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <h2>I no longer have to sniff other dogs for love. I've found the hottest Corgi on TinDog. Woof.</h2>
          <img class="testimonial-img" src="images/pape.jpeg" alt="dog-profile">
          <p class="place">Kaolack, Sénégal</p>
        </div>
        <div class="carousel-item">
          <h2 class="testimonial-text">My dog used to be so lonely, but with TinDog's help, they've found the love of their life. I think.</h2>
          <img class="testimonial-img" src="images/lady-img.jpg" alt="lady-profile">
          <p class="place">Paris, France</p>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>


  <!-- call to action -->
  <section id="cta">
    <h3 class="cta-h3">Acquérir des connaissances pour réaliser le métier de ses rêves ! GO.</h3>
    <div class="row">
      <div class="col-lg-12">
        <img class="studying-img" src="images/studying-img.png" alt="studying-img">
      </div>
      <div class="col-lg-12">
        <button class="btn btn-lg btn-outline-dark sign-button " type="button">S'inscrire</button>
        <button class="btn btn-lg btn-dark sign-button " type="button">Se connecter</button>
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