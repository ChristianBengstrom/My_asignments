<?php
/**
 * model/ModelCountryLanguage.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
require_once 'model/ModelA.inc.php';
require_once 'model/ModelCountry.inc.php';

class CountryLanguage extends Model {
    private $country;
    private $language;
    private $isOfficial;
    private $percentage;

    public function __construct($countrycode
                              , $language
                              , $isOfficial
                              , $percentage) {
        $this->country = new Country($countrycode, null, null, null, null);
        $this->language = $language;
        $this->isOfficial = $isOfficial;
        $this->percentage = $percentage;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function getIsOfficial() {
        return $this->isOfficial;
    }

    public function getPercentage() {
        return $this->percentage;
    }


    public function create() {
        $sql = sprintf("insert into countrylanguage (language
                                                   , countrycode
                                                   , isofficial
                                                   , percentage)
                        values ('%s', '%s', '%s', %s)"
                              , $this->getLanguage()
                              , $this->getCountry()->getCode()
                              , $this->getIsOfficial()
                              , $this->getPercentage());

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
      $sql = sprintf("UPDATE countrylanguage
                      SET isofficial = '%s', percentage = '%s'
                      WHERE countrycode = '%s'
                      AND language = '%s';"
                            , $this->getIsOfficial()
                            , $this->getPercentage()
                            , $this->getCountry()->getCode()
                            , $this->getLanguage()
                            );
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
      $sql = sprintf("DELETE from countrylanguage
                      WHERE countrycode = '%s'
                      AND language = '%s';"
                                , $this->getCountry()->getCode()
                                , $this->getLanguage()
                                // , $id
                                );

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

    public static function retrievel($countrycode) {
        $languages = array();
        $dbh = Model::connect();

        $sql = "select *";
        $sql .= " from countrylanguage";
        $sql .= " where countrycode = :cc";
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':cc', $countrycode);
            $q->execute();
            while ($row = $q->fetch()) {
                $language = self::createObject($row);
                array_push($languages, $language);
            }
        } catch(PDOException $e) {
            printf("<p>Query failed: <br/>%s</p>\n",
                $e->getMessage());
        } finally {
            return $languages;
        }
    }

    public static function createObject($a) {
        $language = $a['language'];
        $isofficial = $a['isofficial'];
        $percentage = $a['percentage'];
        $countrycode = $a['countrycode'];
        $langobj = new CountryLanguage($countrycode
                       , $language
                       , $isofficial
                       , $percentage);
        return $langobj;
    }
}
