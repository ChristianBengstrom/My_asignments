<?php
ini_set("display_errors", "On");
ERROR_REPORTING(E_ALL);
session_start();

$title = 'Shop Front Page';

// objektet kan kun exixtere en gang
require_once './inc/DbH.inc.php';
require_once './inc/DbP.inc.php';
$db = DbH::getDbH();

require_once './inc/Sellable.inc.php';
require_once './inc/Television.inc.php';
require_once './inc/Authentication.inc.php';

if (!Authentication::isAuthenticated()) {  // am I logged on?
        header("Location: ./index.php"); // if not, go away!
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel='stylesheet' href='css/styles.css'/>
    </head>
    <body>
<?php
    include './inc/menu.inc.php';
?>
        <main>


              <?php

              if (Authentication::isAuthenticated()) {
                  $db = DbH::getDbH();
              }


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


    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>Inch</th><th>In stock</th></tr>";

    try {
      print "<h2>Tv</h2>";
      $stmt = $db->prepare("SELECT * FROM tvs");
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

    // see whats inside the db
    $sql = "select inch, stocklevel";
    $sql .= " from tvs";
    $sql .= " order by inch";

    try {
        $rows = $db->query($sql);
        foreach ($rows as $row) {
            $tvs[] = new Television($row['inch'], $row['stocklevel']);
        }
    } catch(PDOException $e) {
        printf("<p>%s</p>\n", $e->getMessage());
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shop Sales Page</title>
        <link rel='stylesheet' href='css/styles.css'/>
    </head>
    <body>

        <main>
            <form action="./myDbAddMod.php" method="post">
                <table>
                    <caption>Stock up</caption>
                    <tr>
                        <td><select name='tvs'>
<?php
    foreach ($tvs as $tv) {
        printf("<option value='%s'>%s inch, in stock: %s</option>\n"
                , $tv->getScreenSize()
                , $tv->getScreenSize()
                , $tv->getStockLevel());
    }
?>
                        </select></td>
                        <td><input type='number' name='tvno'/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Go"/></td>
                    </tr>
                </table>
            </form>
        </main>
        <?php
        $conn = null;
        ?>
    </body>
</html>
