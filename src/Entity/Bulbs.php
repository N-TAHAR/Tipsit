<?php

namespace App\Entity;

class Bulbs{

  private $id;
  private $id_user;
  private $id_post;


  public function increment(){
    $req = App\Database::$pdo->prepare(
      ' UPDATE posts
      SET claps = claps + 1 WHERE id = :id
      '
    );
  
    $req->bindParam(':id', $this->id_post);
    $req->execute();
  }

  public function save(){
    $req = App\Database::$pdo->prepare(
      ' INSERT INTO bulbs (id_user, id_post)
       VALUES (:id_user, :id_post)
      '
    );
  
    $req->bindParam(':id_user', $this->id_user);
    $req->bindParam(':id_post', $this->id_post);
    $req->execute();
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getId_user(){
    return $this->id_user;
  }

  public function setId_user($id_user){
    $this->id_user = $id_user;
  }

  public function getId_post(){
    return $this->id_post;
  }

  public function setId_post($id_post){
    $this->id_post = $id_post;
  }
}

