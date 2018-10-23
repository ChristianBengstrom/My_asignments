<?php
/**
 * Description of Product
 *
 * @author nml
 */
abstract class Product {
    protected $type;
    protected $title;

    public function getProductType() {
        return $this->type;
    }

    public function getTitle() {
        return $this->title;
    }

    abstract public function display();
}
