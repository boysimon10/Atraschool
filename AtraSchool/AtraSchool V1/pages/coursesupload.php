<?php
session_start();
if(isset($_SESSION['id'])) {
  if(isset($_POST['coursesupload'])) {
   $coursesname = htmlspecialchars(ucfirst($_POST['coursesname']));
    $coursesmatiere = htmlspecialchars($_POST['coursesmatiere']);
    $coursesclasse = htmlspecialchars($_POST['coursesclasse']);
    $coursestype = htmlspecialchars($_POST['coursestype']);
    $iduploader = $_SESSION['id'];
    //$coursespdf = htmlspecialchars($_FILES['coursespdf']);

    if(isset($_FILES['coursepdf']['coursesname']))
    {  
      $file_name = $_FILES['coursespdf']['coursesname'];
      $file_tmp = $_FILES['coursespdf']['tmp_name'];

      move_uploaded_file($file_tmp,"courses/".$file_name);

      $insertquery =
      "INSERT INTO courses(coursesname,filename,coursesmatiere,coursesclasse,coursestype,iduploader) VALUES('$coursename','$file_name', '$coursesmatiere', '$coursesclasse', '$coursestype', '$iduploader')";
      $iquery = mysqli_query($con, $insertquery);

     }else{
        $erreur = "OK";
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
              <a class="nav-link" href="cours.html">Cours</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="exercices.html">Exercices</a>
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
                <a href="index.php?page=setting&id=<?php echo $_SESSION['id'] ?>">Paramètres du compte </a>
                <a href="index.php?page=logout">Déconnexion</a>
              </div>
          </ul>
        </div>
      </nav>
    </div>
  </section>

  <!-- sign-in -->
  <section id="sign-in">
  <form method="post" enctype="multipart/form-data">
    <h2 style="margin-bottom: 5%; color:#212529;"><i class="fa-solid fa-right-to-bracket"></i>Upload Cours/Exercices</h2>
    <div class="form-floating mb-3">
      <input type="text" name="coursesname" class="form-control" id="floatingInput" placeholder="Nom">
      <label for="floatingInput">Nom</label>
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Upload un fichier PDF</label>
      <input class="form-control" name="coursespdf" type="file" id="formFile">
    </div>
    <div class="mb-3">
      <select class="form-select" name="coursesclasse" aria-label="Default select example">
        <option selected>Classe</option>
        <option value="6eme">6éme</option>
        <option value="5eme">5éme</option>
        <option value="4eme">4éme</option>
        <option value="3eme">3éme</option>
        <option value="Seconde L">Seconde L</option>
        <option value="Seconde S">Seconde S</option>
        <option value="Première S1">Première S1</option>
        <option value="Première S2">Première S2</option>
        <option value="Première L1">Première L1</option>
        <option value="Première L2">Première L2</option>
        <option value="Première L'">Première L'</option>
        <option value="Terminale S1">Terminale S1</option>
        <option value="Terminale S2">Terminale S2</option>
        <option value="Terminale L1">Terminale L1</option>
        <option value="Terminale L2">Terminale L2</option>
        <option value="Terminale L'">Terminale L'</option>
      </select>
    </div>
    <div class="mb-3">
      <select class="form-select" aria-label="Default select example" name="coursesmatiere">
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
 <div class="form-check form-check-inline">
     <input class="form-check-input" type="radio" name="coursestype" value="course" id="flexRadioDefault1">
     <label class="form-check-label" for="flexRadioDefault1">Cours</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="coursestype" value="exercise" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">Exercices</label>
</div><br/>
      <button class="btn btn-primary btn-connect" name="coursesupload">Uploader</button>
    </div><br/>
    <?php if(isset($erreur)) { echo $erreur; } ?>
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
      Header('Location: index.php?page=signin');
  }
?>