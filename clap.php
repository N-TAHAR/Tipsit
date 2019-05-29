<?php

include "assets/config/bootstrap.php";

  
  $id = $_POST['postId'];

  $req = App\Database::$pdo->prepare(
    ' UPDATE posts
    SET claps = claps + 1 WHERE id = :id
    '
  );

  $req->bindParam(':id', $id);
  $req->execute();


  /*
  composer init
  minimum stability: stable
  dependencies : no
  */
