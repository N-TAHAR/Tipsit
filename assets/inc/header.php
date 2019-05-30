<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <title>Tipsit</title>
  
</head>
<body>

<header>
  <nav>
    <ul class="header">
      <li><a href="index.php"><img class="logo" src="./assets/img/logo.png"></a></li>
      <?php if(isLoggedIn()): ?>
        <li><input class="search" type="text" placeholder="Search"></li>
        <!-- <li><a href="favoris.php">Favoris</a></li>   -->
        <!-- <(?php if($_SERVER['PHP_SELF'] === '/Tipsit/index.php') : ?>
          <a href="index.php?<(?php echo getURL(["userTips" => "on"])?>"> UserTips </a>   
        <(?php endif ?> -->
        <li><a href="login.php?logout">Deconnexion</a></li>  
      <?php else : ?>
      <li><a href="login.php">Connexion</a></li>
      <li><a href="register.php">Inscription</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>
