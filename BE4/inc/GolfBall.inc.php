<?php
/**
 * Description of TennisBall
 * @author nml
 * example from textbook, Doyle, 2010
 */
class GolfBall implements Sellable {
    private $_color;
    private $noinstock; // number in stockUp
    private $indents; // prikker i golfbolden (egenskab)


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
