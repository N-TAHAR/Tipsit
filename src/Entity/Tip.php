<?php

namespace App\Entity;

class Tip {

    private static $id;
    private static $username;
    private static $content;
    private static $date;
    private static $claps;
    private static $keyword;
    
    public static function createTip(){
      //creer un tip
      self::setUsername($_SESSION['user']['username']);
      self::setContent($_POST['content']);
      self::setKeyword($_POST['keyword']);

      $req = \App\Database::$pdo -> prepare(
        'INSERT INTO posts (username, content, keyword, date)
        VALUE (:username, :content, :keyword, NOW())'
      );
      $req -> bindParam(':username', self::getUsername());
      $req -> bindParam(':content', self::getContent());
      $req -> bindParam(':keyword', self::getKeyword());
      $req -> execute();
      header('Location: index.php');
    }

    public static function setTipProps($username, $content, $keyword, $date, $id, $claps){
      self::setUsername($username);
      self::setContent($content);
      self::setKeyword($keyword);
      self::setDate($date);
      self::setId($id);
      self::setClaps($claps);
    }

    //

    public static function getId(){
      return self::$id;
    }

    public static function setId($id){
      self::$id = $id;
    }

    public static function getUsername(){
      return self::$username;
    }

    public static function setUsername($username){ 
      self::$username = $username;
    }

    public static function getContent(){
      return self::$content;
    }

    public static function setContent($content){
      self::$content = $content;
    }

    public static function getDate(){
      return self::$date;
    }

    public static function setDate($date){
      self::$date = $date;
    }

    public static function getKeyword(){
      return self::$keyword;
    }

    public static function setKeyword($keyword){
      self::$keyword = $keyword;
    }

    public static function getClaps(){
      return self::$claps;
    }

    public static function setClaps($claps){
      self::$claps = $claps;
    }

  }

/**
 * props qui on le meme nom que leur tip
 * pour chaque props avoir un get et un set
 * method save 
 * classe TipRepository qui recupere tous les tips
 * PDO::fetch_class
 * 
 * 
 * Recherche:
 * match against
 * FULLTEXT
 */
