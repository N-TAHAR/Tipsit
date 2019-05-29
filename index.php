<?php 
  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";
?>

  <h1>Tipsit</h1>
  <section class='tips'>
  <?php

  $tips = App\Entity\TipRepository::getAllTipsByBulbs('all');

  foreach ($tips as $tip) {
  ?>
  <article class="post" id="<?php echo $tip->getId() ?>">
    <h2> <?php echo '#' . $tip->getKeyword() ?> </h2>
    <p class="article"> <?php echo $tip->getContent() ?> </p>
    <div class="bottom">
      <div class="bottomlikes">
        <div class="ampoule"  onclick="ajax(<?php echo $tip->getId() ?>)">
          <p class="addition"></p>
          <img src="./assets/img/ampoulenoire.svg" class="ampoulenoire">
          <img src="./assets/img/ampoulesombre.svg" class="ampoulesombre">
          <img src="./assets/img/Sans titre - 1.svg" class="partie1">
          <img src="./assets/img/Sans titre - 2.svg" class="partie2">
          <img src="./assets/img/Sans titre - 3.svg" class="partie3">
          <img src="./assets/img/Sans titre - 4.svg" class="partie4">
          <img src="./assets/img/Sans titre - 5.svg" class="partie5">
          <img src="./assets/img/Sans titre - 6.svg" class="partie2white">
          <img src="./assets/img/Sans titre - 7.svg" class="partie3white">
          <img src="./assets/img/Sans titre - 8.svg" class="partie4white">
          <img src="./assets/img/Sans titre - 9.svg" class="partie5white">
        </div>
        <p class="bulb"> <span class="bulbNumber"><?php echo $tip->getClaps() ?></span>&nbsp;bulb</p>
      </div>
      <p class="name"> <?php echo $tip->getUsername() ?> </p>
    </div>
    <!-- <span class="date"><(?php echo $tip->getDate() ?> </span> -->
  </article>
  
  <?php 
  //in array
  // epizy
  }
  ?>
  </section>

  <script src="main.js"></script>

</body>
</html>
