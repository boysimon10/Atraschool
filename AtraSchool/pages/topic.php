<?php
session_start();
?>
   <div id="header">
    <div class="menu">
        <ul>
            <li class="logo"><img src="images/logo.png"></li>
            <li><a href="index.php?page=home">Accueil</a></li>
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
       <div class="topic-box">
           <div class="boxinfotopic"><br />
               <span class="ppinfotopic"><img src="images/avatar/<?php echo $_SESSION['avatar'] ?>" /></span><br />
               <span class="">66 vues</span><br />
               <span class="">39 Rep</span>
           </div>
           <div class="topicmessagebox">
               <div class="barreinfotopic">
                   <span>Ecrit par Simon Diouf Le 27/10/2001 à 19:15</span>
                   <hr size="1" width="80%" color="#192a56">
               </div>
               <div class="topicmessage">
                   <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel rutrum metus. Maecenas et mattis ligula. Etiam et lectus id urna dignissim varius. Quisque ornare diam at ante ultricies vehicula. Quisque sed sapien nulla. Donec venenatis nunc est, et placerat dui pretium vitae. Etiam sit amet ultrices nisi.

                       Praesent quis velit ut risus imperdiet facilisis. Etiam tempor mollis erat, at maximus orci egestas et. Aenean condimentum tempus justo, vel euismod arcu porta eget. Aliquam ac tincidunt elit. Nunc nec porttitor sapien. Curabitur vestibulum, augue sed mattis volutpat, metus lacus euismod tellus, ac pulvinar ex nulla ac dui. Mauris nibh libero, porttitor eu sem id, mollis pellentesque arcu. Phasellus vel tortor et dui eleifend efficitur vestibulum a tortor. Sed lorem nisl, luctus eu ligula eget, feugiat bibendum urna. In vel aliquet metus. In iaculis auctor hendrerit. Aenean molestie mi risus. Etiam vel urna felis. Aliquam ut risus vehicula ex sollicitudin mollis eget at quam.
                   </p>
               </div>
           </div>
           <div class="topiccommentbox">
               <span style="font-size: bold; color: #192a56; font-size: 23px;">Répondre</span>
               <hr size="1" width="50%" color="#192a56">
               <form method="">
                   <textarea class="commenttextaera" name=""></textarea>
                   <button name=""><i class="i-paper-plane"></i></button>
               </form>
           </div>
       </div>
   </div>
