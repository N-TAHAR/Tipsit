<?php 
  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";
?>

  <h1>Tipsit</h1>

  <?php

  $tips = App\Entity\TipRepository::getAllTips();

  foreach ($tips as $tip) {
  App\Entity\Tip::setTipProps($tip->username, $tip->content, $tip->keyword, $tip->date, $tip->id, $tip->claps)
  ?>
  <article class="post" id="<?php echo App\Entity\Tip::getId() ?>">
    <h2> <?php echo '#' . App\Entity\Tip::getKeyword() ?> </h2>
    <p class="article"> <?php echo App\Entity\Tip::getContent() ?> </p>
    <div class="bottom">
      <div class="bottomlikes">
        <div class="like"  onclick="ajax(<?php echo App\Entity\Tip::getId() ?>)"></div>
        <p class="bulb"> <span class="bulbNumber"><?php echo App\Entity\Tip::getClaps() ?></span>&nbsp;bulb</p>
      </div>
      <p class="name"> <?php echo App\Entity\Tip::getUsername() ?> </p>
    </div>
    <span class="date"><?php echo App\Entity\Tip::getDate() ?> </span>
  </article>
  <?php 
  }

  ?>

  <script src="main.js"></script>

</body>
</html>