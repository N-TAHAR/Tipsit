<?php

namespace App\Entity;

class TipRepository{

  public function getAllTips(){

    $req = Database::$pdo->query(
      'SELECT *
      FROM posts
      '
    );


  }
}