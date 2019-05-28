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
    
      while($donnees = $req -> fetch()){?>
        <div class="tip">;
        <p><?php  strip_tags($donnees['username'])  ?></p>;
        <p><?php  strip_tags($donnees['content'])  ?></p>;
        <time><?php  strip_tags($donnees['date'])  ?></time>;
        <div>;
        <div onclick="ajax('.<?php $donnees['id'] .')" class="clap">;
        </div>;  
        echo    <span> claps: '  $donnees['claps']  </span>;
        </div>;
        <p>  '#'  strip_tags($donnees['keyword'])  </p>;
        </div>; 
      }
    }
  }