<?php

namespace App\Entity;

class TipRepository {

  public static function getAllTipsByDate($keyword){

    if ($keyword === 'all') {
      $req = \App\Database::$pdo->prepare(
        'SELECT *
        FROM posts
        ORDER BY date DESC
        '
      );
    } else {

      $req = \App\Database::$pdo->prepare(
        'SELECT *
        FROM posts
        WHERE keyword = :keyword
        ORDER BY date DESC
        '
      );

      $req -> bindParam(':keyword', $keyword);
    }

    $req->execute();
    $tips = $req->fetchAll(\PDO::FETCH_CLASS);

    return $tips;
  }
  public static function getAllTipsByBulbs($keyword){

    if ($keyword === 'all') {
      $req = \App\Database::$pdo->prepare(
        'SELECT *
        FROM posts
        ORDER BY claps DESC
        '
      );
    } else {
      $req = \App\Database::$pdo->prepare(
        'SELECT *
        FROM posts
        WHERE keyword = :keyword
        ORDER BY claps DESC
        '
      );

      $req -> bindParam(':keyword', $keyword);
    }


    $req->execute();
    $tips = $req->fetchAll(\PDO::FETCH_CLASS, Tip::class);
    return $tips;
  }
}