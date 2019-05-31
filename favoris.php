<?php

include "assets/config/bootstrap.php";
$tips = \App\Entity\TipRepository::sortTipsBy('hot', 'all', $_SESSION['user']['username']);

$bulbs = new App\Entity\Bulbs();
foreach ($tips as $tip) {

// checker le nombre de likes sur chaque post par l'utilisateur connecté
if(isset($_SESSION['user']['id'])){
      $bulbs->setUserId($_SESSION['user']['id']);
      $bulbs->setPostId($tip->id);
  
      $bulbNumber = $bulbs->getLikesByUser();
    }
?>
<html>
<head>
  <meta charset="UTF-8">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <title>Tipsit</title>
</head>

<body>

<?php if (intval($bulbNumber['bulbNumber']) >= 10) : ?>

<article class="post" id="<?php echo $tip->getId() ?>">
    <h2> <?php echo '#' . $tip->getKeyword() ?> </h2>
    <p class="article"> <?php echo $tip->getContent() ?> </p>
    <div class="bottom">
      <div class="bottomlikes">
        <div class="ampoule" onclick="<?php 
          if(isset($_SESSION['user']['id'])){
            echo 'ajax(' . $tip->getId() . ')' ;
          }else{
            echo 'redirect()' ;
          }
         
         ?>">
          <p class="addition"></p>
          <img src="./assets/img/ampoulenoire.svg" class="ampoulenoire">
          <img src="./assets/img/ampoulesombre.svg" class="ampoulesombre <?php
          if(isset($_SESSION['user']['id'])){
            if(intval($bulbNumber['bulbNumber']) >= 10) {
              echo 'add';
            }
          }
          
          ?>">
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
    <span class="date"> <?php $tip->getDateMessage(); ?> </span>
</article>

<?php endif; 
}?>

<script src="main.js"></script>

</body>
</html>
