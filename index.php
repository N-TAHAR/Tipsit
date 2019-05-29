<?php 
  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";
?>

  <h1>Tipsit</h1>

  <?php

  $tips = App\Entity\TipRepository::getAllTipsByBulbs('all');

  foreach ($tips as $tip) {
  ?>
  <article class="post" id="<?php echo $tip->getId() ?>">
    <h2> <?php echo '#' . $tip->getKeyword() ?> </h2>
    <p class="article"> <?php echo $tip->getContent() ?> </p>
    <div class="bottom">
      <div class="bottomlikes">
        <div class="like"  onclick="ajax(<?php echo $tip->getId() ?>)"></div>
        <p class="bulb"> <span class="bulbNumber"><?php echo $tip->getClaps() ?></span>&nbsp;bulb</p>
      </div>
      <p class="name"> <?php echo $tip->getUsername() ?> </p>
    </div>
    <span class="date"><?php echo $tip->getDate() ?> </span>
  </article>
  <?php 
  //in array
  // epizy
  }

  ?>

  <script src="main.js"></script>

</body>
</html>
