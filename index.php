<?php 

  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";
?>

  <h1>Tipsit</h1>

  <?php
    if(isset($_SESSION['user']['username'])){
      echo '<h2>Salut ' . $_SESSION['user']['username'] . ' !</h2>';
    } else {
      echo '<h2>Salut ' . "l'inconnu" . ' !</h2>';
      echo '<p>Inscris toi <a href="register.php">ici</a> pour te faire connaître.</p>';
    }
  ?>
  
</body>
</html>