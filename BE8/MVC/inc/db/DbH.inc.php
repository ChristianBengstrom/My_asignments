<?php
require_once "DbP.inc.php";
// objektet kan kun exixtere en gang
class DbH extends DbP {

    private static $dbh; // static!

    private function __construct() { // insætter automatisk parent::__construct(); hvor værdierne ikke er defineret. disse defineres efterfølgene.

    }

    public static function getDbH() { // skal bruge :: hvis man kalder en static function
        if (empty(self::$dbh)) { // hvis static var instance er tom
          try {
              self::$dbh = new PDO(DbP::DSN, DbP::DBUSER, DbP::USERPWD);
              self::$dbh->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
              die(printf("<p>Connect failed for following reason: <br/>%s</p>\n",
                  $e->getMessage()));
          }
        }
        return self::$dbh;
    }
}
