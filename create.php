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

<div class="post post--form">
  <form action="create.php" method="post">
    <select class="keyword keyword--form" name="keyword" id="keyword">
      <option value="">Please choose a keyword</option>
      <option value="front">front</option>
      <option value="back">back</option>
      <option value="design">design</option>
    </select>
    <textarea class="article article--form" name="content" id="content" cols="30" rows="10" maxlength="300" placeholder="Write your tip here ..."></textarea> 
    <input class="bottom bottom--form" type="submit" name="create">
  </form>
</div>
</body>
</html>