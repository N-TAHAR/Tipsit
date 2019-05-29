<?php
  include "assets/config/bootstrap.php";


  if(isset($_POST['register'])){
    $username = trim(strip_tags($_POST['username']));
    $email = trim(strip_tags($_POST['email']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $req = \App\Database::$pdo->prepare(
      'INSERT INTO user (username, email, password)
      VALUE (:username, :email, :password)'
    );
    $req -> bindParam(':username', $username);
    $req -> bindParam(':email', $email);
    $req -> bindParam(':password', $password);
    $req -> execute();
    header('Location: login.php');
  }

  include "assets/inc/header.php";

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