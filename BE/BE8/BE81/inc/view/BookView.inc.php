<?php
/**
 * Description of BookView
 *
 * @author nml
 */
class BookView extends ProductView {

    public function __construct() {
        // $this->title = $title;
        // $this->$pageCount = $pageCount;
        // $this->type = 'Book';
    }

    public function display() {
        parent::displayHead();
        $this->rollOut();
        parent::displayFoot();
    }

    private function rollOut() {
        $arr = Book::getBooks();
        print("<table>\n");
        print("<caption>Books</caption>\n");
        var_dump($arr);

        foreach ($arr as $book) {
            $s = "<tr><td><a href='index.php?p=b2&amp;id=%s'>%s</a></td><td>%s</td><td class='r'>%4d</td></tr>\n";
            printf($s, $book->getId(), $book->getId(), $book->getTitle(), $book->getPageCount());
        }
        print("</table>\n");
    }
}
