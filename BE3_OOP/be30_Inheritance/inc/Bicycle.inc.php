<?php
/**
 * Description of Bicycle
 *
 * @author nml
 */
class Bicycle extends Vehicle {

    public function __construct($brand, $color, $name) {
        parent::__construct($brand, $color, $name);
        $this->setType('bicycle');
    }
}
