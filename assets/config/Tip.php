<?php 

class Tip {

  public function __construct($username, $content, $date, $claps, $keyword) {
    $this->username = $username;
    $this->content = $content;
    $this->date = $date;
    $this->claps = $claps;
    $this->keyword = $keyword;
  }

}