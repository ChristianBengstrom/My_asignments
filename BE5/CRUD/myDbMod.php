<?php
    require_once './includes/dbparams.inc.php';
    require_once './includes/dbconnect.inc.php';
    require_once './includes/Sellable.inc.php';
    require_once './includes/Television.inc.php';

    $inch = $_POST['tvs'];
    $tvno = $_POST['tvno'];

    $sql = "select inch, stocklevel";
    $sql .= " from tvs";
    $sql .= " where inch = :inch";
    try {
        $q = $dbh->prepare($sql);
        $q->bindValue(':inch', $inch);
        $q->execute();
        $row = $q->fetch();
        $tv = new Television($row['inch'], $row['stocklevel']);
    } catch(PDOException $e) {
        printf("<p>%s</p>\n", $e->getMessage());
    }
    $tv->sellItems($tvno);

    $sql = 'update tvs';
    $sql .= ' set stocklevel = :stocklevel';
    $sql .= ' where inch = :inch';
    try {
      $q = $dbh->prepare($sql);
      $q->bindValue(':stocklevel', $tv->getStockLevel());
      $q->bindValue(':inch', $tv->getScreenSize());
      $q->execute();
    } catch(PDOException $e) {
      die("Posting failed. Call a friend.<br/>".$e->getMessage());
    }
    header('Location: ./index.php?code=0');
