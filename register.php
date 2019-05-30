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
      echo 'Please, fill the form';
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
    <h2>Sign up</h2>
    <form class="form-co" action="register.php" method="post">
      <div class="form-input">
        <label class="form__title" for="username">Your username</label>
        <input type="text" name="username">
      </div>
      <div class="form-input">
        <label class="form__title" for="email">Your email</label>
        <input type="email" name="email">
      </div>
      <div class="form-input">
        <label class="form__title" for="password">Your password</label>
        <input type="password" name="password">
      </div>
      <input class="register" type="submit" name="register" value="Sign up !">
    </form>
    <div class="connection">
      <p>Already have an account ?</p>
      <a class="is-active-text" href="login.php">Sign in</a>
    </div>
  </div>
</section>

</body>
</html>