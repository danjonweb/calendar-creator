<?php
class Router {
  private $controller;
  private $action;
  private $request;
  private $id = null;
  
  public function __construct($request) {
    $this->request = $request;
            
    // Assign controller
    if ($this->request['controller'] == '') {
      // Default controller is app
      $this->controller = 'app';
    } else {
      $this->controller = $this->request['controller'];
    }
    
    // Assign action
    if ($this->request['action'] == '') {
      // Default action is index
      $this->action = 'calendar';
    } else {
      $this->action = $this->request['action'];
    }
    
    // Assign id
    if ($this->request['id'] == '') {
      // Check for query string
      if ($this->request['date'] == '') {
        // Default to today
        $dt = new DateTime();
        $dt->setTimezone(new DateTimeZone(MY_TIME_ZONE));
        $this->id = $dt->format('Y-m-d');
      } else {
        // Set id to the d param. This is done so we can set the date with a get request.
        $this->id = $this->request['date'];
      }
    } else {
      $this->id = $this->request['id'];
    }
    
    
    
    $canonical_url = ROOT_URL."/{$this->controller}/{$this->action}";
    if ($this->id != null) {
      $canonical_url .= "/{$this->id}";
    }    
    if ($_SERVER['REQUEST_URI'] != $canonical_url) {
      header("Location: $canonical_url");
    }
    
  }
  
  public function getController() {
    if (class_exists($this->controller)) {
      if (method_exists($this->controller, $this->action)) {
        return new $this->controller($this->action, $this->request, $this->id);
      } else {
        echo "<h1>Action {$this->action} does not exist</h1>";
      }
    } else {
      echo "<h1>Controller {$this->controller} does not exist</h1>";
    }
  }
  
}

?>