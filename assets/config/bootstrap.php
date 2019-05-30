<?php
require_once __DIR__ . '/../../vendor/autoload.php';

//Fichier de configuration principal 
// (n'a rien avoir avec Bootstrap CSS)

// __DIR__ retourne le chemin jusqu'au dossier dans lequel le fichier se trouve
App\Database::connect();


session_start();