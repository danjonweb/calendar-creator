<?php
class AppModel extends AbstractModel {
  private $day;
  
  public function calendar($date) {
    $this->day = new Day($date);
    
    if (isset($_POST['add'])) {
      $this->db->query('INSERT INTO events (date, content) VALUES (?, ?)');
      $this->db->bind('ss', [$this->day->getDate(), '']);
      $this->db->execute();
    }
    
    if (isset($_POST['delete'])) {
      $this->db->query('DELETE FROM events WHERE id = ?');
      $this->db->bind('i', [$_POST['id']]);
      $this->db->execute();
    }
    
    $this->db->query("SELECT * FROM events WHERE date = ? ORDER BY id ASC");
    $this->db->bind('s', [$this->day->getDate()]);
    $results = $this->db->getResults();
    foreach ($results as $result) {
      $this->day->addEvent($result['id'], $result['content']);
    }
  }
  
  public function ajaxUpdate($id) {
    $Parsedown = new Parsedown();
    $this->db->query('UPDATE events SET content = ? WHERE id = ?');
    $this->db->bind('si', [$_POST['content'], $id]);
    $this->db->execute();
    echo $Parsedown->text($_POST['content']);
  }
  
  public function getDate() {
    return $this->day->getDate();
  }
  
  public function getEvents() {
    return $this->day->getEvents();
  }
  
  public function getNumEvents() {
    return count($this->day->getEvents());
  }
  
}

?>