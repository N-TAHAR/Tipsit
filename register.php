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

  include "templates/header.php";

?>

<h1>Inscription</h1>

<form action="register.php" method="post">
  <div>
    <label for="username">Username</label>
    <input type="text" name="username">
  </div>
  <div>
    <label for="email">Email</label>
    <input type="email" name="email">
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" name="password">
  </div>
  <input type="submit" name="register" value="Valider">
</form>


</body>
</html>