<?php

namespace App;

class Database {

    private const DB_SGBD   = 'mysql';
    private const DB_HOST   = 'localhost';
    private const DB_DBNAME = 'tipsit';
    private const DB_USER   = 'root';
    private const DB_PASS = ''; 
    public static $pdo;

    public static function connect() {
      try {
        // si une exception est lancé dans le bloc,
        // le bloc catch sera exécuté
      
        // Instantiation de PDO
        self::$pdo = new \PDO(
          //mysql=host=localhost;dbname=tipsit;
          self::DB_SGBD . ':host=' . self::DB_HOST . ';dbname=' . self::DB_DBNAME . ';',
          self::DB_USER,
          self::DB_PASS,
          [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
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
