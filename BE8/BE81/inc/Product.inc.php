<?php
/*
 * This is the MODEL
 */
  require_once './inc/db/DbP.inc.php';
  require_once './inc/db/DbH.inc.php';

  require_once './inc/Book.inc.php';
  require_once './inc/DVD.inc.php';
  require_once './inc/LiveLecture.inc.php';

  abstract class Product {
      protected $type;
      protected $title;

      public function getProductType() {
          return $this->type;
      }

      public function getTitle() {
          return $this->title;
      }

      abstract public function display();
  }
