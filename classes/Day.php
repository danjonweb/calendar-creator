<?php
class Day {
  private $date;
  private $events;
  
  public function __construct($date) {
    $this->date = $date;
    $this->events = array();
  }
  
  public function getDate() {
    return $this->date;
  }
  
  public function addEvent($id, $content) {
    $event = new Event($id, $content);
    array_push($this->events, $event);
  }
  
  public function getEvents() {
    return $this->events;
  }
}

?>