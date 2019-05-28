<?php 
  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";
  include "class/tip.php";
?>

  <h1>Tipsit</h1>

  <?php

    $tip = new Tip;
    $tip->createTips();

  ?>

  <script src="main.js"></script>

</body>
</html>