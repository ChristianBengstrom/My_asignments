
<?php
/*
 * This is a CONTROLLER
 */

      require_once './inc/Product.inc.php';   // the model
      require_once '?'; // a view

      class TelevisionRC {
          private $model;

          public function __construct() {
              $this->model = new Product();    // model create
          }

          public function action($p) {
              // run the functions
              $v = new TelevisionV1($this->model);    // create the view
              $v->display();                          // initiate the view
          }
      }
