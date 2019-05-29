<?php

namespace App\Entity;

class User{

  public $connexion;

  private $id;
  private $username;
  private $email;
  private $password;

  public function signup(){
    $req = \App\Database::$pdo->prepare(
      'INSERT INTO user (username, email, password)
      VALUE (:username, :email, :password)'
    );
    $req -> bindParam(':username', $this->username);
    $req -> bindParam(':email', $this->email);
    $req -> bindParam(':password', $this->password);
    $req -> execute();
  }

  public function connexion(){
    //récupére l'utilisateur dans la base de donnée 
    $req = \App\Database::$pdo -> prepare(
      ' SELECT * 
        FROM user
        WHERE username = :username
      '
    );
    $req -> bindParam(':username', $this->username);
    $req -> execute();

    $this->connexion = $req -> fetch(\PDO::FETCH_ASSOC);

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
    $this->username = htmlspecialchars($username);
  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = htmlspecialchars($email);
  }

  public function getPassword(){
    return $this->password;
  }

  public function setPassword($password){
    $this->password =  password_hash($password, PASSWORD_DEFAULT);
  }

}