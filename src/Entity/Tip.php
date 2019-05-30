<?php

namespace App\Entity;

class Tip {

    const CATEGORIES = array(
      'front',
      'back',
      'design'
    );
    public $id;
    public $username;
    public $content;
    public $date;
    public $claps;
    public $keyword;
    
    public function createTip(){

      $req = \App\Database::$pdo -> prepare(
        'INSERT INTO posts (username, content, keyword, date)
        VALUES (:username, :content, :keyword, NOW())'
      );
      $req -> bindParam(':username', $this->getUsername());
      $req -> bindParam(':content', $this->getContent());
      $req -> bindParam(':keyword', $this->getKeyword());
      $req -> execute();
    }

    public function getDateMessage() {
      $postDate = strtotime($this->getDate());
      $currentDate = time();
      $datediff = $currentDate - $postDate;
      $dateDifference = round($datediff / (60 * 60 * 24));
  
      if ($dateDifference == 0) {
        $dateMessage = 'Posted today';
      } else if ($dateDifference <= 1) {
        $dateMessage = 'Posted ' . $dateDifference . ' day ago';
      } else {
        $dateMessage = 'Posted ' . $dateDifference . ' days ago';
      }
      echo $dateMessage;

    }

    public function getId(){
      return $this->id;
    }

    public function setId($id){
      $this->id = $id;
    }

    public function getUsername(){
      return $this->username;
    }

    public function setUsername($username){ 
      $this->username = $username;
    }

    public function getContent(){
      return htmlspecialchars($this->content);
    }

    public function setContent($content){
      $this->content = $content;
    }

    public function getDate(){
      return $this->date;
    }

    public function setDate($date){
      $this->date = $date;
    }

    public function getKeyword(){
      return $this->keyword;
    }

    public function setKeyword($keyword){
      $this->keyword = $keyword;
    }

    public function getClaps(){
      return $this->claps;
    }

    public function setClaps($claps){
      $this->claps = $claps;
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
