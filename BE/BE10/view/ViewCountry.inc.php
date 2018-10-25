<?php
/**
 * view/ViewCountry.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */

require_once 'view/View.inc.php';

class CountryView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }

    private function displayManyCountries() {
        $countries = Country::retrieveco();
        $s = "<div class='haves'>";
        foreach ($countries as $country) {
            $s .=  sprintf("%s: %s<br/>\n"
                , $country->getCode(), $country->getName());
        }
        $s .= "</div>";
        return $s;
    }

    private function display1c() {
        // return sprintf("%s<br/>\n"
        //     , $this->model->getId());
    }

    private function countryForm() {
        $s = sprintf("<form action='%s?function=Co' method='post'>\n
                      <div class='gets'>\n
                      <h3>Create Country</h3>
                      <p>
                        Contrycode<br/>
                        <input type='text' name='code'
                        value='%s'
                        required/>
                      </p>\n
                      <p>
                        Name<br/>
                        <input type='text' name='name' required/>
                      </p>\n
                      <p>
                        Continent<br/>
                        <input type='text' name='continent' required/>
                      </p>\n
                      <p>
                        Population<br/>
                        <input type='text' name='population' required/>
                      </p>\n
                      <p>
                        Region<br/>
                        <input type='text' name='region'
                        required/>
                      </p>\n
                      <p><input type='submit' name='createGo' value='Go!'/></p>
                      </div>\n
                      </form/>"
                      , $_SERVER['PHP_SELF']
                      , $this->model->getCode()
                      );

        return $s;
    }

    private function editCountryForm() {
        $s = sprintf("<form action='%s?function=Co' method='post'>\n
                      <div class='gets'>\n
                      <h3>Edit Country</h3>
                      <p>
                        Contrycode<br/>
                        <input type='text' name='code' required/>
                      </p>\n
                      <p>
                        Name<br/>
                        <input type='text' name='name' required/>
                      </p>\n
                      <p>
                        Continent<br/>
                        <input type='text' name='continent' required/>
                      </p>\n
                      <p>
                        Population<br/>
                        <input type='text' name='population' required/>
                      </p>\n
                      <p>
                        Region<br/>
                        <input type='text' name='region' required/>
                      </p>\n

                      <p><input type='submit' name='updateGo' value='Go!'/></p>
                      </div>\n
                      </form/>"
                      , $_SERVER['PHP_SELF']
                      );
        return $s;
    }
    private function deleteCountryForm() {
        $s = sprintf(" <form action='%s?function=Co' method='post'>\n
                          <div class='gets'>\n"
                        , $_SERVER['PHP_SELF']);

        $s .= "         <h3>Delete Country</h3>";

        $countries = Country::retrieveco($this->model->getCode());
        $s .= "         <select name='code'>\n";
        foreach ($countries as $country) {
            $s .=  sprintf("  <option value='%s'>%s</option>\n"
                , $country->getCode(), $country->getName());
        }
        $s .= "          </select>\n";

        $s .= "
                          <input type='submit' name='deleteGo'>\n
                        </div>
                      </form>\n";

        return $s;
    }

    private function displayCountry() {
        $s = sprintf("<main class='main'>\n%s\n%s\n%s\n%s</main>\n"
                    , $this->displayManyCountries()
                    , $this->countryForm()
                    , $this->editCountryForm()
                    , $this->deleteCountryForm());
        return $s;
    }

    public function display(){
       $this->output($this->displayCountry());
    }
}
