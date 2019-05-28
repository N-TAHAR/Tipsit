<?php

class configPDO {

  public static $pdo;
    // private const SGBD = "..." 

    public static function connect() {
      try {
        // si une exception est lancé dans le bloc,
        // le bloc catch sera exécuté
      
        // Instantiation de PDO
        self::$pdo = new PDO(
          //mysql=host=localhost;dbname=tipsit;
          DB_SGBD . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';',
          DB_USER,
          DB_PASS,
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
          ]
      
        );
      
      
      } catch (Exception $e) {
        // Une Exception est une erreur sous forme d'objet
        // die est une instruction qui arrête le script
        die('Erreur de connexion à la Base de Données: ' . $e->getMessage());
      }
      
    }
   
  }

// On tente d'exécuter du code dans le bloc try
