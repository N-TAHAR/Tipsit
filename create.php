<?php 

  include "assets/config/bootstrap.php";

  

  if(empty($_SESSION['user'])){
    header('Location: index.php');
  }
  
  if(isset($_POST['create'])){
    if(!empty(trim($_POST['content']))){
      if(!empty($_POST['keyword'])){
        $tip = new App\Entity\Tip();
        $tip->setUsername($_SESSION['user']['username']);
        $tip->setContent($_POST['content']);
        $tip->setKeyword($_POST['keyword']);
        if (in_array($tip->getKeyword(), $tip::CATEGORIES)) {
          $tip->createTip();
          header('Location: index.php');
        } else {
          echo 'please use a correct keyword';
        };
      } else{
        echo 'choose a keyword';
      }
    } else {
        echo 'write something';
    }
  }

  include "assets/inc/header.php";
?>

<h1>Create new tips</h1>

<form action="create.php" method="post">
  <textarea name="content" id="content" cols="30" rows="10" maxlength="300" placeholder="Write your tip here ..."></textarea>
  <label for="keyword">Choose a keyword</label>
  <select name="keyword" id="keyword">
    <option value="">Please choose a keyword</option>
    <option value="front">front</option>
    <option value="back">back</option>
    <option value="design">design</option>
  </select>
  <input type="submit" name="create">
</form>

</body>
</html>