<?php
/*
 * This is the CONTROLLER
 */
 //DB
 require_once './inc/db/DbH.inc.php';
 require_once './inc/db/DbP.inc.php';
 $dbh = DbH::getDbH();

require_once './inc/model/Product.inc.php';
require_once './inc/model/Book.inc.php';               // model layer
require_once './inc/model/DVD.inc.php';                // model layer
require_once './inc/model/LiveLecture.inc.php';        // model layer

require_once './inc/view/ProductView.inc.php';         // view layer
require_once './inc/view/BookView.inc.php';            // view layer
require_once './inc/view/DVDView.inc.php';             // view layer
require_once './inc/view/LectView.inc.php';            // view layer

class ProductC {
    private $model;

    public function __construct() {
        //
    }

    public function action($get) {
        foreach ($get as $key => $value) {
            $$key = $value;
        }

        if (isset($p) && $p == 'b1') {              // list all books
            $booksArray = [];
            Book::getBooks($booksArray, $dbh);            // read all books
            $v = new BookView($booksArray);         // create view
            $v->display();                          // send them to view
        } elseif (isset($p) && $p == 'd1') {
            // read data from Model
            // create relevant view
            // send them to view
        } elseif (isset($p) && $p == 'l1') {
            // read data from Model
            // create relevant view
            // send them to view
        } else {
            $v = new ProductView($this->model);     // create view front page
            $v->display();                          // show it
        }
    }
}
