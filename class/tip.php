<?php

class Tip {

    public $pdo;

    private function startPDO(){
      $getPDO = new configPDO;
      $getPDO->getPDO();
      $this->pdo = $getPDO->pdo;;
    }
    
    public function createTips(){

      $this->startPDO();

      $req = $this->pdo -> prepare(
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
        echo '<div>';
        echo    '<a href="index.php?clap='. $donnees['id'] .'"><div class="clap"></div></a>';
        if(isset($_GET['clap'])){
          if($_GET['clap'] === $donnees['id']){
            $donnees['claps']++;
          }
        }
        echo    '<span>' . $donnees['claps'] . '</span>';
        echo '</div>';
        echo '<p>' . '#' . strip_tags(($donnees['keyword'])) . '</p>';
        echo '</div>'; 
      }
    }

    // private function incrementClap(){
    //   if(isset($_POST['login'])){



    //     $req = $pdo -> prepare(
    //       ' UPDATE table
    //       SET  = 'nouvelle valeur' 
    //       '
    //     );
    
    //     $req -> bindParam(':username', $_POST['username']);
    //     $req -> execute();
    //   }
    // }

  }