<?php
/**
 * Description of Product View
 *
 * @author nml
 */
class ProductView {

    private $model;
    private $title = 'Product MVC';

    public function __construct($model) {
        $this->model = $model;
    }

    private function top() {
        $s = "<!doctype html>
<html>
%4s<head>
%8s<meta charset='utf-8'/>
%8s<title>%s</title>
%8s<link rel='stylesheet' href='./css/styles.css'/>
%4s</head>
%4s<body>\n";
        return sprintf($s, ' ', ' ', ' ', $this->title, ' ', ' ', ' ');
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

    private function footer() {
        $s = "%8s<footer>
%12s<small>&copy; NML, %d</small>
%8s</footer>
%4s</body>
</html>\n";
        return sprintf($s, ' ', ' ', strftime("%Y", time()), ' ', ' ');
    }

    public function displayHead() {
            print($this->top());
            print($this->header());
        }

        public function displayFoot() {
            print($this->footer());
        }

        private function displayEmptyMain() {
            printf("%8s<main>\n%8s</main>\n", ' ', ' ');
        }

        public function display() {
            $this->displayHead();
            $this->displayEmptyMain();
            $this->displayFoot();
        }
    }
