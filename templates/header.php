<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <title>Tipsit</title>
  
</head>
<body>

<header>
  <nav>
    <ul>
      <li><a href="index.php"><img src="./assets/img/logo.png"></a></li>
      <?php if(App\Entity\User::isLoggedIn()): ?>
        <li><a href="favoris.php">Favoris</a></li>  
        <?php if($_SERVER['PHP_SELF'] === '/tipsit/index.php') : ?>
          <a class="<?php if($_GET['userTips'] === 'on') { echo 'is-active'; } ?>" href="index.php?<?php echo App\Entity\Url::getURL(["userTips" => "on"])?>"> UserTips </a>   
        <?php endif ?>
        <li><a href="login.php?logout">Deconnexion</a></li>  
      <?php else : ?>
      <li><a href="login.php">Connexion</a></li>
      <li><a href="register.php">Inscription</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  
  <?php
  
    if(isset($_GET['userTips'])){
      if($_GET['userTips'] === 'on'){
        echo '<h1>My Tips</h1>';
      }else{
        echo '<h1>Tipsit</h1>';
      }
    }
  ?>


  <div class="sub-header">

    <ul class="sort">
      <li class="hot <?php if($_GET['sort'] === 'hot') { echo 'is-active'; } ?>"><a href="index.php?<?php echo App\Entity\Url::getURL(["sort" => "hot"]);?>"> Hot </a></li>
      <li class="new <?php if($_GET['sort'] === 'new') { echo 'is-active'; } ?>"><a href="index.php?<?php echo App\Entity\Url::getURL(["sort" => "new"])?>"> New </a>
    </ul>

    <ul class="menu">
      <li class="menu__li <?php if($_GET['keyword'] === 'all') { echo 'is-active'; } ?>"><a href="index.php?<?php echo App\Entity\Url::getURL(["keyword" => "all"])?>"> All </a></li>
      <li class="menu__li <?php if($_GET['keyword'] === 'front') { echo 'is-active'; } ?>"><a href="index.php?<?php echo App\Entity\Url::getURL(["keyword" => "front"])?>"> Front </a></li>
      <li class="menu__li <?php if($_GET['keyword'] === 'back') { echo 'is-active'; } ?>"><a href="index.php?<?php echo App\Entity\Url::getURL(["keyword" => "back"])?>"> Back </a></li>
      <li class="menu__li <?php if($_GET['keyword'] === 'design') { echo 'is-active'; } ?>"><a href="index.php?<?php echo App\Entity\Url::getURL(["keyword" => "design"])?>"> Design </a></li>
    </ul>

    <div class="create">
      <a href="create.php">Add a new tip</a>
    </div>
  </div>

</header>