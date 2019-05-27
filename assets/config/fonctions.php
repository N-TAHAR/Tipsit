<?php

//Un utilisateur est-il connecté ?
function isLoggedIn() : bool
{
  return isset($_SESSION['user']);
}

// Récupérer une information liée à l'utilisateur
// Typage nullable: indiquer un type ou null
// ?type
// (applicable aux arguments et type de retour)
function getUserInfo(string $info) : ?string
{
  // Retourner la 1ere valeur définie et non-nulle
  // $val1 ?? $val2 ?? $val3
  return $_SESSION['user'][$info] ?? null;

  // if(isset($_SESSION['user'][$info])){
  //   return $_SESSION['user'][$info];
  // }
  // return null;
}
