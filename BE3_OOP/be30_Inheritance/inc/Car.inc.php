<?php
/**
 * Description of Truck
 *
 * @author nml
 */
class Car extends Vehicle {
    protected $doors;
    protected $trailer;

    public function __construct($brand, $color, $name, $doors, $trailer) {
        parent::__construct($brand, $color, $name);
        $this->doors = $doors;
        $this->trailer = $trailer;
        $this->setType('car');
    }

    public function getTrailer() {
        return $this->trailer;
    }

    public function getDoors() {
        return $this->doors;
    }

    public function __toString() {
        return sprintf("%s, %s, %s\n"
                , parent::__toString()
                , $this->getTrailer()   // Kan ikke printe FALSE.
                , $this->getDoors());
    }
}
