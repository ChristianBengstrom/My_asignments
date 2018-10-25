<?php
/**
 * model/ModelCountry.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
require_once 'model/DbP.inc.php';
require_once 'model/DbH.inc.php';
require_once 'model/ModelIf.inc.php';
require_once 'model/ModelA.inc.php';

class Country extends Model {
    private $code;
    private $name;
    private $continent;
    private $population;
    private $region;


    public function __construct($code
                              , $name
                              , $continent
                              , $population
                              , $region) {
        $this->code = $code;
        $this->name = $name;
        $this->continent = $continent;
        $this->population = $population;
        $this->region = $region;
    }

    public function getCode() {
        return $this->code;
    }

    public function getName() {
        return $this->name;
    }

    public function getContinent() {
        return $this->continent;
    }

    public function getPopulation() {
        return $this->population;
    }

    public function getRegion() {
        return $this->region;
    }

    public function create() {
        $sql = sprintf("insert into country (code, name, continent, population, region, surfacearea, indepyear, lifeexpectancy, gnp, gnpold, localname, governmentform, headofstate, capital, code2)
                        values ('%s', '%s', '%s', %s, '%s', 123, 123, 123, 123, 123, 'test', 'test', 'test', 123, 123)"
                              , $this->getCode()
                              , $this->getName()
                              , $this->getContinent()
                              , $this->getPopulation()
                              , $this->getRegion());

                              print $sql;
        $dbh = Model::connect();
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
        } catch(PDOException $e) {
            printf("<p>Insert failed: <br/>%s</p>\n",
                $e->getMessage());
        }
        $dbh->query('commit');
    }
    public function update($id, $attr, $newValue) {
      $sql = sprintf("UPDATE country
                      SET name = '%s', continent = '%s', population = '%s', region = '%s'
                      WHERE code = '%s';"
                            , $this->getName()
                            , $this->getContinent()
                            , $this->getPopulation()
                            , $this->getRegion()
                            , $this->getCode());
      print "$sql";

      $dbh = Model::connect();
      try {
          $q = $dbh->prepare($sql);
          $q->execute();
      } catch(PDOException $e) {
          printf("<p>Update of country failed: <br/>%s</p>\n",
              $e->getMessage());
      }
      $dbh->query('commit');
    }
    public function delete($id) {
      $sql = sprintf("delete from country
                      where code = '%s';"
                                , $id);

      $dbh = Model::connect();
      try {
          $q = $dbh->prepare($sql);
          $q->execute();
      } catch(PDOException $e) {
          printf("<p>delete of city failed: <br/>%s</p>\n",
              $e->getMessage());
      }
      $dbh->query('commit');
    }

      public static function retrieveco() {
          $countries = array();
          $dbh = Model::connect();

          $sql = "select *";
          $sql .= " from country";
          try {
              $q = $dbh->prepare($sql);
              $q->execute();
              while ($row = $q->fetch()) {
                  $country = self::createObject($row);
                  array_push($countries, $country);
              }
          } catch(PDOException $e) {
              printf("<p>Query failed: <br/>%s</p>\n",
                  $e->getMessage());
          } finally {
              return $countries;
          }
      }

    public static function createObject($a) {
        $code = $a['code'];
        $name = $a['name'];
        $continent = $a['continent'];
        $population = $a['population'];
        $region = $a['region'];
        $country = new Country($code
                       , $name
                       , $continent
                       , $population
                       , $region);
        return $country;
    }
}
