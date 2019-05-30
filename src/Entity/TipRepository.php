<?php

namespace App\Entity;

class TipRepository {

  public static function sortTipsBy($sort, $keyword, $username = NULL) {

    if ($sort === 'new') {
      if ($keyword === 'all') {
        if(!$username){
          $req = \App\Database::$pdo->prepare(
            'SELECT *
            FROM posts
            ORDER BY date DESC
            '
          );
        }else{
          $req = \App\Database::$pdo->prepare(
            'SELECT *
            FROM posts
            WHERE username = :username
            ORDER BY date DESC
            '
          );
          $req -> bindParam(':username', $username);
        }
      } 
      else {
        if(!$username){
          $req = \App\Database::$pdo->prepare(
            'SELECT *
            FROM posts
            WHERE keyword = :keyword
            ORDER BY date DESC
            '
          );
          $req -> bindParam(':keyword', $keyword);
        }else{
          $req = \App\Database::$pdo->prepare(
            'SELECT *
            FROM posts
            where username = :username AND keyword = :keyword
            ORDER BY date DESC
            '
          );
          $req -> bindParam(':username', $username);
          $req -> bindParam(':keyword', $keyword);

        }
      }
    }
    else {
      if ($keyword === 'all') {
        if(!$username){
          $req = \App\Database::$pdo->prepare(
            'SELECT *
            FROM posts
            ORDER BY claps DESC
            '
          );
        }else{
          $req = \App\Database::$pdo->prepare(
            'SELECT *
            FROM posts
            WHERE username = :username
            ORDER BY claps DESC
            '
          );
          $req -> bindParam(':username', $username);

        }
      } 
      else {
        if(!$username){
          $req = \App\Database::$pdo->prepare(
            'SELECT *
            FROM posts
            WHERE keyword = :keyword
            ORDER BY claps DESC
            '
          );
          $req -> bindParam(':keyword', $keyword);
        }else{
          $req = \App\Database::$pdo->prepare(
            'SELECT *
            FROM posts
            WHERE username = :username AND keyword = :keyword
            ORDER BY claps DESC
            '
          );
          $req -> bindParam(':username', $username);
          $req -> bindParam(':keyword', $keyword);
        }
      }
    }

    $req->execute();
    $tips = $req->fetchAll(\PDO::FETCH_CLASS, Tip::class);

    return $tips;
  }

  private static function getUserTips($username){
    $req = \App\Database::$pdo->prepare(
      'SELECT *
      FROM posts
      where username = :username
      '
    );
    // $req -> bindParam(':username', $username);

    // $req->execute();
    // $tips = $req->fetchAll(\PDO::FETCH_CLASS, Tip::class);
    // return $tips;
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