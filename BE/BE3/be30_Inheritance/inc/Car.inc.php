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
        parent::__construct($brand, $color, $name); // sætte automatisk værdier ind jævnfør parrent klassen
        $this->doors = $doors;
        $this->trailer = $trailer;
        $this->setType('car'); // test parrent function smart
    }

    public function getTrailer() {
        $trailer = FALSE;
        if ($this->trailer) {
          $trailer = TRUE;
        }
        return $trailer;
    }

    public function getDoors() {
        return $this->doors;
    }

    public function __toString() {
      $tjeckTrailer = "has no trailer";
      if ($this->getTrailer()) {
        $tjeckTrailer = "has a trailer";
      }

          return sprintf("%s, %s, %s\n"
                  , parent::__toString()
                  , $this->getDoors()   // Kan ikke printe FALSE.
                  , $tjeckTrailer);
      }
    }
