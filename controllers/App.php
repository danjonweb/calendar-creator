<?php
class App extends AbstractController {
  
  // Default action, called by executeAction in parent
  public function calendar() {
    // Create the model, call this action, and insert the view with the model
    $model = new AppModel();
    $model->calendar($this->id);
    $this->insertView($model);
  }
}
?>