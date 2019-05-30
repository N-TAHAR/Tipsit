<?php

namespace App\Entity;

class Url{
  public static function getURL($array){
    $params = array_merge($_GET, $array);
    return http_build_query($params);
  }

  public static function redirectLogin(){
    header('Location: login.php');
  }
}