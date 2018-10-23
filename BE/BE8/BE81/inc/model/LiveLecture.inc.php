<?php

/**
 * Description of LiveLecture
 *
 * @author nml
 */
 
 class LiveLecture extends Product {
     protected $duration;
     protected $lecturer;
     protected $topic;

     public function __construct($title, $duration, $lecturer, $topic) {
         parent::__construct('LiveLecture', $title);
         $this->duration = $duration;
         $this->lecturer = $lecturer;
         $this->topic = $topic;
     }

     public function getDuration() {
         return $this->duration;
     }

     public static function getLectures(&$arr) {
         // read lectures
         // loop them into objects and put them into arr
     }

    // public function display() {
    //     printf("<p>%s:, %s, %s, %s, %s\n"
    //             , $this->getProductType()
    //             , $this->getTitle()
    //             , $this->getLecturer()
    //             , $this->getDuration()
    //             , $this->getTopic());
    // }
}
