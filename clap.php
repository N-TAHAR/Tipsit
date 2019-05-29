<?php

include "assets/config/bootstrap.php";

  
  $id_post = $_POST['postId'];
  $id_user = $_SESSION['user']['id'];

  $bulbs = App\Entity\Bulbs();

  $bulbs->setId_post($id_post);
  $bulbs->setId_user($id_user);

  $bulbs->increment()
  $bulbs->save()

  // $req = App\Database::$pdo->prepare(
  //   ' UPDATE posts
  //   SET claps = claps + 1 WHERE id = :id
  //   '
  // );

  // $req->bindParam(':id', $id_post);
  // $req->execute();

  // $req = App\Database::$pdo->prepare(
  //   ' INSERT INTO bulbs (id_user, id_post)
  //    VALUES (:id_user, :id_post)
  //   '
  // );

  // $req->bindParam(':id_user', $id_user);
  // $req->bindParam(':id_post', $id_post);
  // $req->execute();
