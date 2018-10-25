<?php
/**
 * Description of Vehicle
 *
 * @author nml
 */
class Vehicle {
    private $brand;
    private $color;
    private $tone = 'HONK HONK!';
    protected $type = 'vehicle';
    private $name;

    public function __construct($brand
                               , $color
                               , $name) {
        $this->brand = $brand;
        $this->color = $color;
        $this->name = $name;
    }

    public function honk() {
        return sprintf("<span class='%s'>%s</span>\n"
                , $this->getType(), $this->getTone());
    }

    public function whoami() {
        return $this->name;
    }

    public function getTone() {
        return $this->tone;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function __toString() {
        return sprintf("%s: %s\n"
                , $this->whoami(), $this->honk());
    }
}
