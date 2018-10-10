<?php
/**
 * Description of Product View
 *
 * @author nml
 */
class ProductView {

    public function __construct() {
        // to come later, perhaps
    }

    private function header() {
        $s = "%8s<header>
%12s<h1>Shop Front Page</h1>
%12s<ul id='menu'>
%16s<li><a href='index.php'>Home</a></li>
%16s<li><a href='index.php?p=b1'>Books</a></li>
%16s<li><a href='index.php?p=d1'>DVDs</a></li>
%16s<li><a href='index.php?p=l1'>Live Lectures</a></li>
%12s</ul>
%8s</header>\n";
         return sprintf($s, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');
    }

    public function display() {
        print($this->header());
    }
}
