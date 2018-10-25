<?php
/**
 * view/ViewCity.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */

require_once 'view/View.inc.php';

class CityView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }

    private function displayManyCities() {
        $cities = City::retrievec($this->model->getCountry()->getCode());
        $s = "<div class='haves'>";
        foreach ($cities as $city) {
            $s .=  sprintf("%s: %s<br/>\n"
                , $city->getId(), $city->getName());
        }
        $s .= "</div>";
        return $s;
    }

    private function display1c() {
        return sprintf("%s<br/>\n"
            , $this->model->getId());
    }

    private function cityForm() {
        $s = sprintf("<form action='%s?function=C' method='post'>\n
                      <div class='gets'>\n
                      <h3>Create city</h3>
                      <p>
                        Name<br/>
                        <input type='text' name='name' required/>
                      </p>\n
                      <p>
                        District<br/>
                        <input type='text' name='district' required/>
                      </p>\n
                      <p>
                        Population<br/>
                        <input type='text' name='population' required/>
                      </p>\n
                      <p>
                        Country<br/>
                        <input type='text' name='countrycode'
                        value='%s'
                        required readonly/>
                      </p>\n
                      <p><input type='submit' name='editGo' value='Go!'/></p>
                      </div>\n
                      </form/>"
                      , $_SERVER['PHP_SELF']
                      , $this->model->getCountry()->getCode()
                      );
        return $s;
    }

    private function editCityForm() {
        $s = sprintf("<form action='%s?function=C' method='post'>\n
                      <div class='gets'>\n
                      <h3>Edit City</h3>
                      <p>
                        ID to Change:<br/>
                        <input type='text' name='id' required/>
                      </p>\n
                      <p>
                        Name<br/>
                        <input type='text' name='name' required/>
                      </p>\n
                      <p>
                        District<br/>
                        <input type='text' name='district' required/>
                      </p>\n
                      <p>
                        Population<br/>
                        <input type='text' name='population' required/>
                      </p>\n
                      <p>
                        Country<br/>
                        <input type='text' name='countrycode'
                        value='%s'
                        required readonly/>
                      </p>\n
                      <p><input type='submit' name='updateGo' value='Go!'/></p>
                      </div>\n
                      </form/>"
                      , $_SERVER['PHP_SELF']
                      , $this->model->getCountry()->getCode()
                      );
        return $s;
    }

    private function deleteCityForm() {
        $s = sprintf(" <form action='%s?function=C' method='post'>\n
                          <div class='gets'>\n"
                        , $_SERVER['PHP_SELF']);

        $s .= "         <h3>Delete City</h3>";

        $cities = City::retrievec($this->model->getCountry()->getCode());
        $s .= "         <select name='id'>\n";
        foreach ($cities as $city) {
            $s .=  sprintf("  <option value='%s'>%s</option>\n"
                , $city->getId(), $city->getName());
        }
        $s .= "          </select>\n";

        $s .= "
                          <input type='submit' name='deleteGo'>\n
                        </div>
                      </form>\n";

        return $s;
    }

    private function displayCity() {
        $s = sprintf("<main class='main'>\n%s\n%s\n%s\n%s</main>\n"
                    , $this->displayManyCities()
                    , $this->cityForm()
                    , $this->editCityForm()
                    , $this->deleteCityForm());
        return $s;
    }

    public function display(){
       $this->output($this->displayCity());
    }
}
