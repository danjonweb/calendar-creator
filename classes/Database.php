<?php
class Database {
  private static $instance = null;
  
  private $conn = null;
  private $stmt = null;
  private $error = null;

  public static function getInstance() {
    if (self::$instance == null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }
  
  private function __construct() {
    // Auto-connect at creation
    $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($this->conn->connect_error) {
      $this->error = $this->conn->connect_error;
    }
    
  }
  
  public function close() {
    $this->conn->close();
  }
  
  public function query($sql) {
    $this->stmt = $this->conn->prepare($sql);
  }
  
  public function bind($types, $values) {
    $this->stmt->bind_param($types, ...$values);
  }
  
  public function execute() {
    $this->stmt->execute();
  }
  
  public function getResults() {
    $this->execute();
    $result = $this->stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}

?>