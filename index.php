<?php 

  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";
?>

  <h1>Tipsit</h1>

  <?php
    if(isset($_SESSION['user']['username'])){
      echo '<h2>Bonjour, ' . $_SESSION['user']['username'] . '. </h2>';
    }
  ?>
  
</body>
</html>