<?php
/**
 * Description of Book
 * Model Layer
 * @author nml
 */
class Book extends Product {
    protected $pageCount;
    protected $dbh;
    protected static $books = array();

    public function __construct($id, $title, $pageCount) {
        parent::__construct($id, 'book', $title);
        $this->pageCount = $pageCount;
    }

    public function getPageCount() {
        return $this->pageCount;
    }

    public static function getBooks() {
        return self::$books;
    }

    public static function setBooks() {
        $dbh = DbH::getDbH();
        $sql = "select p.id, title, pagecount";
        $sql .= " from book b";
        $sql .= " join product p";
        $sql .= " on b.id = p.id";
        $sql .= " order by title";
        try {
          $q = $dbh->prepare($sql);
          $q->execute();
          while ($row = $q->fetch()) {
              $book = new Book($row['id'], $row['title'], $row['pagecount']);
              array_push(self::$books, $book);
          }
        } catch(PDOException $e) {
          printf("<p>Query failed: <br/>%s</p>\n",
            $e->getMessage());
        }
    }
}
