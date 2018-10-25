<?php
/**
 * model/ModelCity.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
require_once 'model/ModelA.inc.php';
require_once 'model/ModelCountry.inc.php';

class City extends Model {
    private $name;
    private $country;
    private $id;
    private $population;
    private $district;

    public function __construct($countrycode
                              , $district
                              , $id
                              , $name
                              , $population) {
        $this->country = new Country($countrycode, null, null, null, null);
        $this->name = $name;
        $this->district = $district;
        $this->id = $id;
        $this->population = $population;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getName() {
        return $this->name;
    }

    public function getDistrict() {
        return $this->district;
    }

    public function getId() {
        return $this->id;
    }

    public function getPopulation() {
        return $this->population;
    }

    public function create() {
        $sql = sprintf("insert into city (name, countrycode, district, population)
                        values ('%s', '%s', '%s', %s)"
                              , $this->getName()
                              , $this->getCountry()->getCode()
                              , $this->getDistrict()
                              , $this->getPopulation());

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
      $sql = sprintf("UPDATE city
                      SET name = '%s', district = '%s', population = %s
                      WHERE id = %s;"
                            , $this->getName()
                            , $this->getDistrict()
                            , $this->getPopulation()
                            , $id);
      print "$sql";

      $dbh = Model::connect();
      try {
          $q = $dbh->prepare($sql);
          $q->execute();
      } catch(PDOException $e) {
          printf("<p>Update of city failed: <br/>%s</p>\n",
              $e->getMessage());
      }
      $dbh->query('commit');
    }

    public function delete($id) {
      $sql = sprintf("delete from city
                      where id = '%s';"
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

    public static function retrieve1($name) {
        $cities = array();
        $dbh = Model::connect();

        $sql = "select *";
        $sql .= " from city";
        $sql .= " where name = :name";
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':name', $name);
            $q->execute();
            while ($row = $q->fetch()) {
                $city = self::createObject($row);
                array_push($cities, $city);
            }
        } catch(PDOException $e) {
            printf("<p>Query failed: <br/>%s</p>\n",
                $e->getMessage());
        } finally {
            return $cities;
        }
    }

    public static function retrievem() {
        $cities = array();
        $dbh = Model::connect();

        $sql = "select *";
        $sql .= " from city";
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
            while ($row = $q->fetch()) {
                $city = self::createObject($row);
                array_push($cities, $city);
            }
        } catch(PDOException $e) {
            printf("<p>Query failed: <br/>%s</p>\n",
                $e->getMessage());
        } finally {
            return $cities;
        }
    }

    public static function retrievec($countrycode) {
        $cities = array();
        $dbh = Model::connect();

        $sql = "select *";
        $sql .= " from city";
        $sql .= " where countrycode = :cc";
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':cc', $countrycode);
            $q->execute();
            while ($row = $q->fetch()) {
                $city = self::createObject($row);
                array_push($cities, $city);
            }
        } catch(PDOException $e) {
            printf("<p>Query failed: <br/>%s</p>\n",
                $e->getMessage());
        } finally {
            return $cities;
        }
    }

    public static function createObject($a) {
        $id = $a['id'];
        $name = $a['name'];
        $district = $a['district'];
        $population = $a['population'];
        $countrycode = $a['countrycode'];
        $city = new City($countrycode
                       , $district
                       , $id
                       , $name
                       , $population);
        return $city;
    }
}
