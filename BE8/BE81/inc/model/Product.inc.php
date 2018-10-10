<?php
/*
 * This is the MODEL
 */
  require_once './inc/db/DbP.inc.php';
  require_once './inc/db/DbH.inc.php';


  abstract class Product {
      protected $type;
      protected $title;

      public function __construct($type, $title) {
          $this->type = $type;
          $this->title = $title;
      }
      public function getProductType() {
          return $this->type;
      }

      public function getTitle() {
          return $this->title;
      }
  }
