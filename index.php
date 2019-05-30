<?php 
  include "assets/config/bootstrap.php";
  if (!isset($_GET['sort']) || !isset($_GET['keyword'])) {
    header('Location: index.php?' . App\Entity\Url::getURL(["sort" => "hot", "keyword" => "all", "userTips" => "off"]));
  };
  include "templates/header.php";
  
?>


  <br><br>
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
