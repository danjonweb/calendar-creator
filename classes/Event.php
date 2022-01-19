<?php
class Event {
  private $id;
  private $content;
  
  public function __construct($id, $markdown) {
    $this->id = $id;
    $this->content = $markdown;
  }
  
  public function getID() {
    return $this->id;
  }
  
  public function getContent() {
    return $this->content;
  }
  
}

?>