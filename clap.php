<?php

  $getPDO = new configPDO;
  $getPDO->getPDO();
  $this->pdo = $getPDO->pdo;

  $req = $this->pdo -> prepare(
    ' UPDATE posts
    SET claps = :clap WHERE id = :id
    '
  );

  $req -> bindParam(':clap', $clap);
  $req -> bindParam(':id', $id);
  $req -> execute();