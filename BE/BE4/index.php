<?php
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);
/**
 * @author nml
 * example from textbook, Doyle, 2010
 */

    $title = "Form for Sellables";

    require_once './inc/dbparams.inc.php';
    require_once './inc/dbconnect.inc.php';
    require_once './inc/Sellable.inc.php';
    require_once './inc/Television.inc.php';
    require_once './inc/TennisBall.inc.php';
    require_once './inc/GolfBall.inc.php';
    require_once './inc/StoreManager.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>

<?php
    printf("<header><h1>%s</h1></header>\n", $title);


    $tv = new Television();
    $tv->setScreenSize(42);

    $ball = new TennisBall();
    $ball->setColor('yellow');

    $golfball = new GolfBall();
    $golfball->setColor('white');
    // $golfball->setIndents('450');

    $manager = new StoreManager();
    $manager->addProduct($tv);
    $manager->addProduct($ball);
    $manager->addProduct($golfball);
    $manager->stockUp();

    printf("<p>There are now %s %s-inch televisions and %s "
            . "%s tennis balls"
            . " and %s %s golf balls in stock.</p>\n"
            , $tv->getStockLevel()
            , $tv->getScreenSize()
            , $ball->getStockLevel()
            , $ball->getColor()
            , $golfball->getStockLevel()
            , $golfball->getColor());

    print("<p>Selling a television ...</p>\n");
    $tv->sellItem();
    print("<p>Selling two tennis balls...</p>\n");
    $ball->sellItem();
    $ball->sellItem();
    print("<p>Selling five golf balls...</p>\n");
    $golfball->sellItem();
    $golfball->sellItem();
    $golfball->sellItem();
    $golfball->sellItem();
    $golfball->sellItem();

    printf("<p>There are now %s %s-inch televisions and %s "
            . "%s tennis balls"
            . " and %s %s golf balls in stock.</p>\n"
            , $tv->getStockLevel()
            , $tv->getScreenSize()
            , $ball->getStockLevel()
            , $ball->getColor()
            , $golfball->getStockLevel()
            , $golfball->getColor());

            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Color</th><th>In stock</th><th>Indents</th></tr>";

            class TableRows extends RecursiveIteratorIterator {
                function __construct($it) {
                    parent::__construct($it, self::LEAVES_ONLY);
                }

                function current() {
                    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                }

                function beginChildren() {
                    echo "<tr>";
                }

                function endChildren() {
                    echo "</tr>" . "\n";
                }
            }



  try {
      print "<h2>Golfballs</h2>";
      $stmt = $dbh->prepare("SELECT * FROM golfballs");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
          echo $v;

      }
  }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  echo "</table>";


// OLD Order form handler
//   if (isset($_POST["golfColor"])) {
//     $golfColor = $_POST["golfColor"];
//     // $golfQT = $_POST["golfQT"];
//
//     $golfQT = $_POST["golfQT"];
//
//     if (!$golfQT) {
//       $golfQT = 1;
//     }
//     echo "<br><b>".$golfQT."</b>" ." <b>".$golfColor ."</b> golfballs has been added to your cart";
//   }

  echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>Color</th><th>In stock</th></tr>";
  try {
    print "<h2>Tennisballs</h2>";
    $stmt = $dbh->prepare("SELECT * FROM tennisballs");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
  }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  echo "</table>";

  echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>Inch</th><th>In stock</th></tr>";

  try {
    print "<h2>Tv</h2>";
    $stmt = $dbh->prepare("SELECT * FROM tvs");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
  }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  ?>


  <?php


  $conn = null;
  echo "</table>";
?>
    </body>
</html>
