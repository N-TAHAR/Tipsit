<?php
  include "assets/config/bootstrap.php";
// Déconnexion si l'utilisateur arrive depuis login.php?logout
  if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
  }

  if(isset($_SESSION['user']['username'])){
    header('Location: index.php');  
  }

  if(isset($_POST['login'])){
  $user = new App\Entity\User();

  $user->setUsername($_POST['username']);
  $user->connexion();
  if ($user->connexion) {
    if (password_verify($_POST['password'], $user->connexion['password'])) {
      $_SESSION['user'] = $user->connexion;
      session_write_close();
      if(!isset($_SESSION['user']['username']) || !isset($_SESSION['user']['password'])){
        header('Location: login.php');  
      }else{
        header('Location: index.php');  
      }
    }
  }



    // On redirige sur la page d'accueil
  }
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <title>Tipsit</title>
</head>


<body>
  <a href="index.php"><img  class="logo" src="./assets/img/logo.png"> </a>
<section class="sing">
  <div class="img__inscription"></div>
  <div class="user__inscription">
    <h2>Sign in</h2>
      <form class="form-co" action="login.php" method="post">
      <div class="form-input">
        <label class="form__title" for="username">Your username</label>
        <input type="text" name="username">
      </div>
      <div class="form-input">
        <label class="form__title" for="password">Your password</label>
        <input type="password" name="password">
      </div>
      <input class="register" type="submit" name="login" value="Sign in !">
      </form>
      <div class="connection">
        <p>Don't have an account ?</p>
        <a class="is-active-text" href="register.php">Sign up</a>
      </div>
    </div>
</section>


</body>
</html>