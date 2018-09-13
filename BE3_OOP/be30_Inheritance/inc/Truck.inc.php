<?php
/**
 * Description of Truck
 *
 * @author nml
 */
class Truck extends Vehicle {
    private $wheels;

    public function __construct($brand, $color, $name, $wheels) {
        parent::__construct($brand, $color, $name);
        $this->wheels = $wheels;
        $this->setType('truck');
    }

    public function getWheels() {
        return $this->wheels;
    }

    public function __toString() {
        return sprintf("%s, %s\n"
                , parent::__toString()
                , $this->getWheels());
    }
}
