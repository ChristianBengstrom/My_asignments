<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Book
 *
 * @author nml
 */
require_once './inc/Product.inc.php';

class Book extends Product {
    protected $pageCount;

    public function __construct($title, $pageCount) {
        $this->title = $title;
        $this->pageCount = $pageCount;
        $this->type = 'book';
    }

    public function getPageCount() {
        return $this->pageCount;
    }

    public function display() {
        printf("<p>%s: %s (%s pages)\n"
                , $this->getProductType()
                , $this->getTitle()
                , $this->getPageCount());
    }
}
