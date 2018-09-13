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

// public function __toString() {
//   $hasTrailer = "has no trailer";
//   if ($this->getTrailer()) {
//     $hasTrailer = "has a trailer";
//   }
//
//   public function __toString() {
//       return sprintf("%s, %s, %s\n"
//               , parent::__toString()
//               , $this->getDoors()   // Kan ikke printe FALSE.
//               , $hasTrailer);
//   }
// }
// }
//
