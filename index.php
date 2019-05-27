<?php 

  include "assets/config/bootstrap.php";
  include "assets/inc/header.php";
?>

  <h1>Tipsit</h1>

  <?php
    if(isset($_SESSION['user']['username'])){
      echo '<h2>Salut ' . $_SESSION['user']['username'] . ' !</h2>';
    } else {
      echo '<h2>Salut ' . "l'inconnu" . ' !</h2>';
      echo '<p>Inscris toi <a href="register.php">ici</a> pour te faire connaître.</p>';
    }

  
  $req = $pdo -> prepare(
    'SELECT *
    FROM posts
    '
  );

  $req -> execute();

  while($donnees = $req -> fetch()){
    echo '<div class="tip">';
    echo '<p>' . strip_tags(($donnees['username'])) . '</p>';
    echo '<p>' . strip_tags(($donnees['content'])) . '</p>';
    echo '<time>' . strip_tags(($donnees['date'])) . '</time>';
    echo '<p>' . '#' . strip_tags(($donnees['keyword'])) . '</p>';
    echo '</div>'; 
  }
  ?>
  
</body>
</html>