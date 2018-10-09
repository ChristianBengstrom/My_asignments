<?php
/**
 * Description of DVD
 *
 * @author nml
 */
require_once './inc/Product.inc.php';

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
        printf("<p>%s: %s (%s pages)\n"
                , $this->getProductType()
                , $this->getTitle()
                , $this->getDuration());
    }

}
