<?php

include "assets/config/bootstrap.php";

  if(isset($_SESSION['user']['username'])){
    header('Location: index.php');  
  }

  if(isset($_POST['login'])){

    $req = App\Database::$pdo -> prepare(
      ' SELECT * 
        FROM user
        WHERE username = :username AND password = :password
      '
    );

    $req -> bindParam(':username', $_POST['username']);
    $req -> bindParam(':password', $_POST['password']);
    $req -> execute();

    $user = $req -> fetch(PDO::FETCH_ASSOC);


    $_SESSION['user'] = $user;

    // On redirige sur la page d'accueil
    session_write_close();
    if(!isset($_SESSION['user']['username']) || !isset($_SESSION['user']['password'])){
      header('Location: login.php');  
    }else{
      header('Location: index.php');  
    }
  }
  
  // Déconnexion si l'utilisateur arrive depuis login.php?logout
  if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
  }
  include "assets/inc/header.php";
?>

<h1>Connexion</h1>

<form action="login.php" method="post">
  <div>
    <label for="username">Username</label>
    <input type="text" name="username">
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" name="password">
  </div>
  <input type="submit" name="login" value="Valider">
</form>


</body>
</html>