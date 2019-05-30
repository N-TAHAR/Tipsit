<?php 
  include "assets/config/bootstrap.php";
  include "templates/header.php";
  
?>


  <br><br>
  <section class='tips'>
  <?php

  $tips = App\Entity\TipRepository::favoris(intval($_SESSION['user']['id']));

  $bulbs = new App\Entity\Bulbs();
  foreach ($tips as $tip) {

    // checker le nombre de likes sur chaque post par l'utilisateur connecté
    if(isset($_SESSION['user']['id'])){
      $bulbs->setUserId($_SESSION['user']['id']);
      $bulbs->setPostId($tip->id);
  
      $bulbNumber = $bulbs->getLikesByUser();
    }
  
    include "templates/post.php";  
  ?>
  
  <?php 
  }
  ?>
  </section>

  <script src="main.js"></script>

</body>
</html>
