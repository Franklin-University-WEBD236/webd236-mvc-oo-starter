<?php

class IndexController extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function get_index() {
    $this->view->renderTemplate(
      "views/index.php",
      array(
        'title' => 'Home',
      )
    );
  }
}
?>