<?php
/**
 * Description of BookView
 *
 * @author nml
 */
class BookView extends ProductView {

    public function __construct(&$arr) {
        // do something
    }

    public function display() {
        parent::display();
        printf("<p>kilroy was at the books %s</p>\n", 'yeehah');
    }
}
