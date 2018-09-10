<?php
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);

    require_once './inc/dbparams.inc.php';
    require_once './inc/dbconnect.inc.php';
    $title = 'BE2.0';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title><?php print($title);?></title>
        <!-- <link rel='stylesheet' href='./css/style.css'/> -->
    </head>
    <body>
        <?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ISO</th><th>Name</th><th>continent</th><th>regieon</th></tr>";

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
            $stmt = $dbh->prepare("SELECT * FROM countrylanguage");
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
        $conn = null;
        echo "</table>";

        ?>

        <footer>&copy; NML, 2014</footer>
    </body>
</html>
