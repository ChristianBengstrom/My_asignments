<?php
/**
 * Description of Product
 * Model Layer
 *
 * @author nml
 */
abstract class Product {
    protected $id;
    protected $type;
    protected $title;

    public function __construct($id, $type, $title) {
        $this->id = $id;
        $this->type = $type;
        $this->title = $title;
    }
    public function getProductType() {
        return $this->type;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getId() {
        return $this->id;
    }

}
