<?php
/**
 * Description of TennisBall
 * @author nml
 * example from textbook, Doyle, 2010
 */

 // Implements a interface:

class GolfBall implements Sellable {
    private $_color;
    private $noinstock;
    private $indents; // prikker i en golfbolden (egenskab)


    public function getColor() {
        return $this->_color;
    }

    public function setColor( $color ) {
        $this->_color = $color;
    }

    public function addStock( $numItems ) {
        $this->noinstock += $numItems;
    }

    public function sellItem() {
        $returnVal = false;
        if ( $this->noinstock > 0 ) {
            $this->noinstock--;
            $returnVal = true;
        }
        return $returnVal;
    }

    public function getStockLevel() {
        return $this->noinstock;
    }
}
