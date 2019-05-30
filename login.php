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
  

  include "templates/header.php";
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