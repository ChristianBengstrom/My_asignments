<?php
/**
 * Description of Television
 * @author nml
 * example from textbook, Doyle, 2010
 */
require "./Sellable.inc.php";

class Television implements Sellable {
    private $_screenSize;
    private $_stockLevel;

    public function __construct($inch, $stock) {
        $this->_screenSize = $inch;
        $this->_stockLevel = $stock;
    }

    public function getScreenSize() {
        return $this->_screenSize;
    }
    public function setScreenSize( $screenSize ) {
        $this->_screenSize = $screenSize;
    }
    public function addStock( $numItems ) {
        $this->_stockLevel += $numItems;
    }
    public function sellItems( $numItems ) {
        $returnVal = false;
        if ($this->_stockLevel >= $numItems) {
            $this->_stockLevel -= $numItems;
            $returnVal = true;
        }
        return $returnVal;
    }
    public function getStockLevel() {
        return $this->_stockLevel;
    }
}
