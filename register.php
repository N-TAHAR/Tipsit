<?php
  include "assets/config/bootstrap.php";


  if(isset($_POST['register'])){
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){

      $user = new App\Entity\User();
  
      $user->setUsername($_POST['username']);
      $user->setEmail($_POST['email']);
      $user->setPassword($_POST['password']);
      $user->signup();
  
      header('Location: login.php');
    }else{
      echo 'please fill the form';
    }
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
  <a href="index.php"><img class="logo" src="./assets/img/logo.png"> </a>


<section class="sing">
  <div class="img__inscription"></div>
  <div class="user__inscription">
    <h2>Inscription</h2>
    <form class="form-co" action="register.php" method="post">
      <div class="form-input">
        <label class="form__title" for="username">Username</label>
        <input type="text" name="username">
      </div>
      <div class="form-input">
        <label class="form__title" for="email">Email</label>
        <input type="email" name="email">
      </div>
      <div class="form-input">
        <label class="form__title" for="password">Password</label>
        <input type="password" name="password">
      </div>
      <input class="register" type="submit" name="register" value="Valider">
    </form>
    <div class="connection">
      <p>vous avez déjà un compte ?</p>
      <a href="login.php">Connectez-vous</a>
    </div>
  </div>
</section>

</body>
</html>