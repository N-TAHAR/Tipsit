<?php 
  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";

  if (!isset($_GET['sort']) || !isset($_GET['keyword'])) {
    header('Location: index.php?' . getURL(["sort" => "hot", "keyword" => "all"]));
  };
  
  function getURL($array) {
    $params = array_merge($_GET, $array);
    return http_build_query($params);
  };
?>

  <h1>Tipsit</h1>

  <a href="index.php?<?php echo getURL(["sort" => "hot"]);?>"> Hot </a>
  <a href="index.php?<?php echo getURL(["sort" => "new"])?>"> New </a>
  <br> <br>
  <a href="index.php?<?php echo getURL(["keyword" => "all"])?>"> All </a>
  <a href="index.php?<?php echo getURL(["keyword" => "front"])?>"> Front </a>
  <a href="index.php?<?php echo getURL(["keyword" => "back"])?>"> Back </a>
  <a href="index.php?<?php echo getURL(["keyword" => "design"])?>"> Design </a>
  <br><br>

  <?php

  $tips = App\Entity\TipRepository::sortTipsBy($_GET['sort'], $_GET['keyword']);
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
  }
  ?>

  <script src="main.js"></script>

</body>
</html>
