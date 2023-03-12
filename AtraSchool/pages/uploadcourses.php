<?php
session_start();
if(isset($_SESSION['id'])) {
    if(isset($_POST['coursesupload']))
    { 
    $coursesname = htmlspecialchars(trim(ucfirst($_POST['coursesname'])));
    $coursesmatiere = htmlspecialchars($_POST['coursesmatiere']);
    $coursesclasse = htmlspecialchars($_POST['coursesclasse']);
    $coursespdf = htmlspecialchars($_POST['coursespdf']);
    
    $iduploader = $_SESSION['id'];
    if(!empty($_POST['coursesname']) AND !empty($_POST['coursesmatiere']) AND !empty($_POST['coursesclasse']))
    {  
      $coursesnamelength = strlen($coursesname);
      if($coursesnamelength <=255)
      {

    $folder_path = 'courses/';
    $filename = basename($_FILES['coursespdf']['coursesname']);
    $newname = $folder_path . $filename;

    $FileType = pathinfo($newname,PATHINFO_EXTENSION);

    if($FileType == "pdf")
    {
        if (move_uploaded_file($_FILES['coursespdf']['tmp_name'], $newname))
        {

            //$filesql = "INSERT INTO tbl_health (link) VALUES('$filename')";
            //$fileresult = mysql_query($filesql);

            $pdfupload =$bdd->prepare("INSERT INTO courses(iduploader,coursesname,coursesmatiere,coursesclasse,coursespdf)VALUES(?,?,?,?)");
            $pdfupload->execute(array($iduploader,$coursesname,$coursesmatiere,$coursesclasse,$coursespdf));
          //Header('Location: index.php?page=login');

         if (isset($fileresult))
            {
          $erreur ='Cours Mise en ligne';
          } else
          {
        $erreur ='Erreur';
          }
        }
        else
        {

        $erreur ="Upload Failed";
        }

     }
    else
     {
        $erreur ="Le format n'est pas le pdf tonton";
      }                 

      }else{
        $erreur ="Nom du cour trop long tonton.";
      }
    }else{
        $erreur = "Tous les champs doivent etre completes";
    }
}
?>
<div id="boxlogin">
      <div class="boxtextlogin">
          <div class="logolog"><img src="images/logo.png" /></div>
<!--
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur consectetur consequuntur dolores
    ducimus eligendi eveniet expedita facere incidunt natus quam quibusdam quidem, repellat sed sunt tempore voluptatem?
    Eligendi, ipsa!</p>
-->
      </div>
       <div class="boxformlogin">
       <span class="titleboxform">Mettre en ligne un cours</span>
        <form method="POST" action="">
         <input type="text" name="coursesname" placeholder="Nom du cours"><br/><br/>
         <input type="file" name="coursespdf"/><br/><br/>
        <select name="coursesmatiere">
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
            </select><br/><br/> 
            <select name="coursesclasse">
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
                </select><br/><br/>
<!--        <input type="checkbox" value="Rester connecter"/>-->
        <button name="coursesupload" >Upload<i class=""></i></button><br/><br/>
   <a href="#">Mot de passe oublié</a><br/><br/><a href="">S'inscrire</a>
   <?php if(isset($erreur)) { echo $erreur; } ?>

      </div>
  </div>
  <?php
  }else{
      Header('Location: index.php?page=login');
  }
?>