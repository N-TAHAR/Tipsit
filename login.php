<?php

include "assets/config/bootstrap.php";

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
  
  // Déconnexion si l'utilisateur arrive depuis login.php?logout
  if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
  }
  include "assets/inc/header.php";
?>

<section class="sing">
  <div class="img__inscription"></div>
  <div class="user__inscription">
    <h2>connection</h2>
      <form class="form-co" action="login.php" method="post">
      <div class="form-input">
        <label class="form__title" for="username">Username</label>
        <input type="text" name="username">
      </div>
      <div class="form-input">
        <label class="form__title" for="password">Password</label>
        <input type="password" name="password">
      </div>
      <input class="register" type="submit" name="login" value="Valider">
      </form>
      <div class="connection">
        <p>vous n'avez pas de compte?</p>
        <a href="register.php">Inscrivez-vous</a>
      </div>
    </div>
</section>


</body>
</html>