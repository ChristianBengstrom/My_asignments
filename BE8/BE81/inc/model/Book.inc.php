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

 class Book extends Product {
     protected $pageCount;

     public function __construct($title, $pageCount) {
         parent::__construct('book', $title);
         $this->pageCount = $pageCount;
     }

     public function getPageCount() {
         return $this->pageCount;
     }

     public static function getBooks(&$arr, $dbh) {
       $books = array();

       $sql = "SELECT * FROM "
         // read books
         // loop them into objects and put them into arr
     }

    // public function display() {
    //     printf("<p>%s: %s (%s pages)\n"
    //             , $this->getProductType()
    //             , $this->getTitle()
    //             , $this->getPageCount());
    // }
}

public static function setMedia($channel, $dbh) {
        $media = array();

        $sql = "select mediaurl, mimetype";
        $sql .= " from media";
        $sql .= " where channel = :channel";
        try {
          $q = $dbh->prepare($sql);
          $q->bindValue(':channel', $channel);
          $q->execute();
          while ($row = $q->fetch()) {
              $videourl = $row['mediaurl'];
              $mimetype = $row['mimetype'];
              $medio = new Media($videourl, $mimetype);
              array_push($media, $medio);
          }
        } catch(PDOException $e) {
          printf("<p>Query failed: <br/>%s</p>\n",
            $e->getMessage());
        } finally {
          return $media;
        }
    }
