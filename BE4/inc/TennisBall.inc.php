<?php
/**
 * Description of TennisBall
 * @author nml
 * example from textbook, Doyle, 2010
 */
class TennisBall implements Sellable {
    private $_color;
    private $_ballsLeft;

    public function getColor() {
        return $this->_color;
    }

    public function setColor( $color ) {
        $this->_color = $color;
    }

    public function addStock( $numItems ) {
        $this->_ballsLeft += $numItems;
    }

    public function sellItem() {
        $returnVal = false;
        if ( $this->_ballsLeft > 0 ) {
            $this->_ballsLeft--;
            $returnVal = true;
        }
        return $returnVal;
    }

    public function getStockLevel() {
        return $this->_ballsLeft;
    }
}
