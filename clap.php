<?php


header('Content-Type: application/json');


  include "assets/config/bootstrap.php";
  
  
    $postid = $_POST['postId'];
    $userid = $_SESSION['user']['id'];
  
    $bulb = new App\Entity\Bulbs();
  
    $bulb->setUserId($userid);
    $bulb->setPostId($postid);
  
    $bulb->increment(); 
    $bulb->save();

    $postLiked = $bulb->getLikesByUser($postid, $userid);
    $bulb->setBulbNumber($postLiked);

    $bulbNumber = $bulb->getBulbNumber();
    

    echo json_encode($bulbNumber);
