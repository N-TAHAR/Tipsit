<?php 
  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";

  if (!isset($_GET['sort']) || !isset($_GET['keyword'])) {
    header('Location: index.php?' . getURL(["sort" => "hot", "keyword" => "all", "userTips" => "off"]));
  };
  
  function getURL($array) {
    $params = array_merge($_GET, $array);
    return http_build_query($params);
  };
  
  // if($_GET['userTips'] === 'on'){
  //   echo '<h1>My Tips</h1>';
  // }else{
  //   echo '<h1>FEED</h1>';
  // }
?>

<div class="sub-header">
    <ul class="sort">
      <li class="hot">
        <a href="index.php?<?php echo getURL(["sort" => "hot"]);?>"> Hot </a>
      </li>
      <li class="new">
        <a href="index.php?<?php echo getURL(["sort" => "new"])?>"> New </a>
      </li>
      
</ul>
    <ul class="menu">
      <li class="menu__li"><a href="index.php?<?php echo getURL(["keyword" => "all"])?>"> All </a></li>
      <li class="menu__li"><a href="index.php?<?php echo getURL(["keyword" => "front"])?>"> Front </a></li>
      <li class="menu__li"><a href="index.php?<?php echo getURL(["keyword" => "back"])?>"> Back </a></li>
      <li class="menu__li"><a href="index.php?<?php echo getURL(["keyword" => "design"])?>"> Design </a></li>
  </ul>
    <div class="create">
      <a href="create.php">Add a new tip</a>
    </div>
  </div>
  
  <section class='tips'>
  <?php
  if($_GET['userTips'] === 'on' && !empty($_SESSION['user']['username'])){
    $tips = App\Entity\TipRepository::sortTipsBy($_GET['sort'], $_GET['keyword'], $_SESSION['user']['username']);
  }else{
    $tips = App\Entity\TipRepository::sortTipsBy($_GET['sort'], $_GET['keyword']);
  }
  $bulbs = new App\Entity\Bulbs();
  foreach ($tips as $tip) {

    // checker le nombre de likes sur chaque post par l'utilisateur connecté
    $bulbs->setUserId($_SESSION['user']['id']);
    $bulbs->setPostId($tip->id);

    $bulbNumber = $bulbs->getLikesByUser();
  
    include "templates/post.php";  
  ?>
  
  <?php 
  }
  ?>
  </section>

  <script src="main.js"></script>

</body>
</html>
