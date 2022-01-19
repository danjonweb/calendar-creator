<?php
abstract class AbstractController {
  protected $request;
  protected $action;
  protected $id;
  
  public function __construct($action, $request, $id=null) {
    $this->action = $action;
    $this->request = $request;
    $this->id = $id;
  }
  
  public function executeAction() {
    return $this->{$this->action}();
  }
  
  protected function insertView($model) {
    // Default view named same as controller, default action is index
    $view = 'views/' . get_class($this) . '/' . $this->action . '.php';
    // Main contains $view
    require('views/main.php');
  }
}
?>