<?php

namespace App\Entity;

class TipRepository{

  public static function getAllTips(){

    $req = \App\Database::$pdo->query(
      'SELECT *
      FROM posts
      '
    );


    $tips = $req->fetchAll(\PDO::FETCH_CLASS);
    // $req->fetchAll();
    // $req->execute();
    return $tips;
  }
}