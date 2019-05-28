<?php
configPDO::connect();

class Tip {
    

    public function createTips(){

      $req = configPDO::$pdo->prepare(
        'SELECT *
        FROM posts
        '
      );
      
      $req -> execute();

    
      while($donnees = $req -> fetch()){

        echo '<div class="tip">';
        echo '<p>' . strip_tags($donnees['username']) . '</p>';
        echo '<p>' . strip_tags($donnees['content']) . '</p>';
        echo '<time>' . strip_tags($donnees['date']) . '</time>';
        echo '<div>';
        echo '<div onclick="ajax('.$donnees['id'].')" class="clap">';
        echo '</div>';  
        echo    '<span> claps: ' . $donnees['claps'] . '</span>';
        echo '</div>';
        echo '<p>' . '#' . strip_tags(($donnees['keyword'])) . '</p>';
        echo '</div>'; 
      }
    }
  }