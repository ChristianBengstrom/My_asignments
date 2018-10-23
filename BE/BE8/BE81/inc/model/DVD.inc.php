<?php
/**
 * Description of DVD
 *
 * @author nml
 */

 class DVD extends Product {
     protected $duration;

     public function __construct($title, $duration) {
         parent::__construct('DVD', $title);
         $this->pageCount = $pageCount;
     }

     public function getDuration() {
         return $this->duration;
     }

     public static function getDVDs(&$arr) {
         // read dvds
         // loop them into objects and put them into arr
     }

    // public function display() {
    //     printf("<p>%s: %s (%s pages)\n"
    //             , $this->getProductType()
    //             , $this->getTitle()
    //             , $this->getDuration());
    // }
}
