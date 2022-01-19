<?php
class Ajax extends AbstractController {
  
  public function update() {
    $model = new AppModel();
    $model->ajaxUpdate($this->id);
  }
  
}
?>