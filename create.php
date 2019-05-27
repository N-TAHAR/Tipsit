<?php 

  include "assets/config/bootstrap.php";

  if(!isset($_SESSION['user']['username'])){
    header('Location: index.php');
  }

  if(isset($_POST['create'])){
    $username = $_SESSION['user']['username'];
    $content = trim(strip_tags($_POST['content']));
    $keyword = trim(strip_tags($_POST['keyword']));

    $req = $pdo -> prepare(
      'INSERT INTO posts (username, content, keyword, date)
      VALUE (:username, :content, :keyword, NOW())'
    );
    $req -> bindParam(':username', $username);
    $req -> bindParam(':content', $content);
    $req -> bindParam(':keyword', $keyword);
    $req -> execute();
    header('Location: index.php');
  }


  include "assets/inc/header.php";
?>

<h1>Create new tips</h1>

<form action="create.php" method="post">
  <p><?php echo $_SESSION['user']['username']; ?></p>
  <textarea name="content" id="content" cols="30" rows="10" maxlength="300" placeholder="Write your tip here ..."></textarea>
  <label for="keyword">Choose a keyword</label>
  <select name="keyword" id="keyword">
    <option value="">Please choose a keyword</option>
    <option value="dev">dev</option>
    <option value="design">design</option>
    <option value="coucou">coucou</option>
    <option value="life">life</option>
    <option value="animals">animals</option>
  </select>
  <input type="submit" name="create">
</form>

</body>
</html>