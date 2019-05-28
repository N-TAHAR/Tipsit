<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Tipsit</title>
</head>
<body>

<header>
  <nav>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <?php if(isLoggedIn()): ?>
        <li><a href="create.php">new tips</a></li>    
        <li><a href="login.php?logout">Deconnexion</a></li>    
      <?php else : ?>
      <li><a href="login.php">Connexion</a></li>
      <li><a href="register.php">Inscription</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>