<?php 

  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";

  require 'assets/config/Tip.php'
?>

  <h1>Tipsit</h1>

  <?php
    if(isset($_SESSION['user']['username'])){
      echo '<h2>Bonjour, ' . $_SESSION['user']['username'] . '. </h2>';
    }
  
  $req = $pdo -> prepare(
    'SELECT *
    FROM posts
    '
  );

  $req -> execute();

  while($data = $req -> fetch()){

    $tip = new Tip($data['username'], $data['content'], $data['date'], $data['claps'], $data['keyword']);

    echo '<div class="tip">';
      echo '<p>' . $tip->content . '</p>';
      echo '<div class="infos">';
        echo '<p>' . $tip->claps . ' claps</p>';
        echo '<p>#' . $tip->keyword . '</p>';
        echo '<p> date: ' . $tip->date . '</p>';
        echo '<p> A tip by   ' . $tip->username . '</p>';
      echo '</div>';
    echo '</div>'; 
  }
  ?>
  
</body>
</html>