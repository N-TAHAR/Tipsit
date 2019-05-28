<?php

namespace App\Entity;

class Tip {

    private $id;
    private $username;
    private $content;
    private $date;
    private $keyword;
    
    public function createTip(){
      //creer un tip
      $req = configPDO::$pdo -> prepare(
        'INSERT INTO posts (username, content, keyword, date)
        VALUE (:username, :content, :keyword, NOW())'
      );
      $req -> bindParam(':username', $this->getUsername());
      $req -> bindParam(':content', $this->getContent());
      $req -> bindParam(':keyword', $this->getKeyword());
      $req -> execute();
    }

    //

    private function getId(){
      return $this->id;
    }

    private function setId($id){
      $this->id = $id;
    }

    private function getUsername(){
      return $this->username;
    }

    private function setUsername($username){ 
      $this->username = $username;
    }

    private function getContent(){
      return $this->content;
    }

    private function setContent($content){
      $this->content = $content;
    }

    private function getDate(){
      return $this->date;
    }

    private function setDate($date){
      $this->date = $date;
    }

    private function getKeyword(){
      return $this->keyword;
    }

    private function setKeyword($keyword){
      $this->keyword = $keyword;
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
