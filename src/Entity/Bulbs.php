<?php

namespace App\Entity;

class Bulbs {

  private $id_user;
  private $id_post;
  private $bulbNumber;

  public function increment() {
    $req = \App\Database::$pdo->prepare(
      ' UPDATE posts
      SET claps = claps + 1 WHERE id = :id
      '
    );
  
    $req->bindParam(':id', $this->id_post);
    $req->execute();

  }

  public function save() {
    $req = \App\Database::$pdo->prepare(
      ' INSERT INTO bulbs (id_user, id_post)
       VALUES (:id_user, :id_post)
      '
    );
  
    $req->bindParam(':id_user', $this->id_user);
    $req->bindParam(':id_post', $this->id_post);
    $req->execute();
  

  }

  public function getLikesByUser() {
    $req = \App\Database::$pdo->prepare(
      ' SELECT COUNT(*) as bulbNumber from bulbs
      WHERE id_user = :id_user AND id_post = :id_post
      '
    );
  
    $req->bindParam(':id_user', $this->id_user);
    $req->bindParam(':id_post', $this->id_post);
    $req->execute();

    return $req->fetch();

  }

  public function getUserId(){
    return $this->id_user;
  }

  public function setUserId($id_user){
    $this->id_user = $id_user;
  }

  public function getPostId(){
    return $this->id_post;
  }

  public function setPostId($id_post){
    $this->id_post = $id_post;
  }

  public function getBulbNumber(){
    return $this->bulbNumber;
  }

  public function setBulbNumber($bulbNumber){
    $this->bulbNumber = $bulbNumber;
  }


}
