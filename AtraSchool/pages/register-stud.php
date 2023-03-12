<?php
session_start();
    if(isLogged() == 1){
          header('Location: index.php?page=profile&id='.$_SESSION['id']);
    }
if(isset($_POST['forminscription']))
{ 
    $prenom = htmlspecialchars(trim(ucfirst($_POST['prenom'])));
    $nom = htmlspecialchars(trim(ucwords($_POST['nom'])));
    $mail = htmlspecialchars(trim($_POST['mail']));
    $mdp = sha1(trim($_POST['mdp']));
    $mdp2 = sha1(trim($_POST['mdp2']));
    $sexe = htmlspecialchars($_POST['sexe']);
    $jour = htmlspecialchars($_POST['jour']);
    $mois = htmlspecialchars($_POST['mois']);
    $annee = htmlspecialchars(trim($_POST['année']));
    $ecole = htmlspecialchars(ucfirst($_POST['ecole']));
    $classe = htmlspecialchars($_POST['classe']);
    $region = htmlspecialchars($_POST['region']);
    $fonction = "Eleve";
    $avatar = "defaut.png";
    
    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['sexe']) AND !empty($_POST['jour']) AND !empty($_POST['mois']) AND !empty($_POST['année']) AND !empty($_POST['ecole']) AND !empty($_POST['classe']) AND !empty($_POST['region']))
    {  
      $prenomlength = strlen($prenom);
      if($prenomlength <=255)
      {
             $nomlength = strlen($nom);
            if($nomlength <=255)
            {
                if($mdp == $mdp2){
                  $reqmail= $bdd->prepare("SELECT * FROM users WHERE mail=?");
                  $reqmail->execute(array($mail));
                  $mailexist = $reqmail->rowCount();
                  if($mailexist == 0){
                      
                  $insertmbr =$bdd->prepare("INSERT INTO users(prenom,nom,mail,mdp,sexe,jour,mois,annee,ecole,classe,region,fonction,avatar)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
                  $insertmbr->execute(array($prenom,$nom,$mail,$mdp,$sexe,$jour,$mois,$annee,$ecole,$classe,$region,$fonction,$avatar));
                        Header('Location: index.php?page=login');
       
                  }else{
                      $erreur ="Adresse Mail non valide";
                  }
                }else{
                    $erreur ="Les deux mots de passe ne correspondent pas";
                }
            }else{
                $erreur = "Nom trop long";
            }
      }else{
          $erreur ="Prenom trop long";
      }
    }else{
        $erreur = "Tous les champs doivent etre completes";
    }
}
?>
   <span class="backtohome"><a href="index.php?page=home"><button><i class="i-left"></i>Retour à l'accueil</button></a></span>
    <div id="boxregister">
        <div class="boxtextregister">
         <div class="logolog"><img src="images/logo.png" /></div>
        <img width="200px"  src="images/qa.png"/>
        <span>
                <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur consectetur consequuntur dolores
    ducimus eligendi eveniet expedita facere incidunt natus quam quibusdam quidem, repellat sed sunt tempore voluptatem?
    Eligendi, ipsa!
                </p>
            </span>
        </div>
        <div class="boxformregister">
        <span class="titleboxform2">S'inscrire</span><br/>
        <table>
        <form  method="POST" action="">
        <tr>  
           <td><label>Prénom: </label></td>
           <td> <input type="text" name="prenom" placeholder="Prénom" /></td>
        </tr>
        <tr>
           <td><label>Nom: </label></td>
           <td> <input type="text" name="nom" placeholder="Nom" /></td>
           
        </tr>
        <tr>
            <td><label>Adresse Mail: </label></td>
            <td>
             <input type="email" name="mail" placeholder="Adresse Mail" />
            </td>
        </tr>
        <tr>
            <td><label>Mot de passe: </label></td>
            <td>
             <input type="password" name="mdp" placeholder="Mot de passe" />
            </td>
        </tr>
        <tr>
            <td><label>Confirmation: </label></td>
            <td>
             <input type="password" name="mdp2" placeholder=" Confirmation Mot de passe" />
            </td>
        </tr>
        <tr>
            <td>
             <label>Date de Naissance: </label>
             </td>
             <td>
             <select name="jour" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
             <select name="mois">
                    <option value="janvier">Janvier</option>
                    <option value="fevrier">Fevrier</option>
                    <option value="mars">Mars</option>
                    <option value="avril">Avril</option>
                    <option value="mais">Mais</option>
                    <option value="juin">Juin</option>
                    <option value="juillet">Juillet</option>
                    <option value="aout">Aout</option>
                    <option value="septembre">Septembre</option>
                    <option value="octobre">Octobre</option>
                    <option value="novembre">Novembre</option>
                    <option value="décembre">Decembre</option>
                </select>
             <select name="année">
                 <script>
                  var myDate = new Date();
                 var year = myDate.getFullYear();
                 for(var i = 1900; i < year+1; i++){
	        document.write('<option value="'+i+'">'+i+'</option>');
                }
           </script>
                </select>
            </td>
        </tr>
        <tr>
            <td>
             <label>Sexe: </label>
            </td>
            <td>
             <select name="sexe">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
             <label>Classe: </label>      
            </td>
            <td> 
             <select name="classe">
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
            </td>
        </tr>
        <tr>
        <td>
             <label>Region: </label>      
            </td>
            <td> 
        <select name="region">
                 <option value="Dakar">Dakar</option>
                 <option value="Saint louis">Saint louis</option>
                 <option value="Kaolack">Kaolack</option>
                 <option value="Louga">Louga</option>
                 <option value="Diourbel">Diourbel</option>
                 <option value=""></option>
                 <option value=""></option>
                 <option value=""></option>
                 <option value=""></option>
                 <option value=""></option>
                 <option value=""></option>
                 <option value=""></option>
                 <option value=""></option>
                 <option value=""></option>
            </select>
             </td>
            </tr>
                 <tr>
            <td>
              <label>Ecole: </label>    
            </td>
            <td> 
             <input type="text" name="ecole" placeholder="Ecole" />
            </td>
        </tr>
        <tr>
            <td></td> 
            <td><br/><button name="forminscription">S'inscrire</button></td>
        </tr>    
        <tr>
           <td></td> 
           <td><?php
            if(isset($erreur)){
                echo '<p color="#fff">' .$erreur."</p>";
            }
            ?></td>
        </tr>
        </form>
            </table>
        </div>
    </div>