<?php
/**
 * Description of DVD
 *
 * @author nml
 */
class DVD extends Product {
    protected $duration;

    public function __construct($title, $duration) {
        $this->title = $title;
        $this->duration = $duration;
        $this->type = 'DVD';
    }

    public function getDuration() {
        return $this->duration;
    }

    public function display() {
        printf("<p>DVD: %s (%s pages)\n"
                , $this->getTitle()
                , $this->getDuration());
    }

}
