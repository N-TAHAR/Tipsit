<?php

namespace App\Entity;

class Tip {

    public $id;
    public $username;
    public $content;
    public $date;
    public $claps;
    public $keyword;
    public $id_user_favoris;
    
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

    public function favoris(){

      $req = \App\Database::$pdo -> prepare(
        'INSERT INTO favoris (id_user_favoris ,username, content, keyword, claps, date)
        VALUES (:favoris, :username, :content, :keyword, :claps, NOW())'
      );
      $req -> bindParam(':favoris', $this->id_user_favoris);
      $req -> bindParam(':claps', $this->claps);
      $req -> bindParam(':username', $this->username);
      $req -> bindParam(':content', $this->content);
      $req -> bindParam(':keyword', $this->keyword);
      $req -> execute();
    }



    public function getIdUserFavoris(){
      return $this->id_user_favoris;
    }

    public function setIdUserFavoris($id_user_favoris){
      $this->id_user_favoris = $id_user_favoris;
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
