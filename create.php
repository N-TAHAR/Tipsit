<?php 

  include "assets/config/bootstrap.php";

  $categories = array(
    'dev',
    'design',
    'front'
  );

  if(empty($_SESSION['user'])){
    header('Location: index.php');
  }
  
  if(isset($_POST['create'])){
    if(!empty(trim(strip_tags($_POST['content'])))){
      if(!empty(trim(strip_tags($_POST['keyword'])))){
        $tip = new App\Entity\Tip();
        $tip->setUsername($_SESSION['user']['username']);
        $tip->setContent($_POST['content']);
        $tip->setKeyword($_POST['keyword']);
        $tip->createTip();
        header('Location: index.php');
      }else{
        echo 'choose a keyword';
      }
    }else{
      echo 'write something';
    }
  }

  include "assets/inc/header.php";
?>

<h1>Create new tips</h1>

<form action="create.php" method="post">
  <!-- <p></p> -->
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