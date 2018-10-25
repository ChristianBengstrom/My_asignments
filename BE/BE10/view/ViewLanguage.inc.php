<?php
/**
 * view/ViewLanguage.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */

require_once 'view/View.inc.php';

class LanguageView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }

    private function displayManyLanguages() {
        $languages = CountryLanguage::retrievel($this->model->getCountry()->getCode());
        $s = "<div class='haves'>";
        foreach ($languages as $language) {
            $s .=  sprintf("%s: %s<br/>\n"
                , $language->getLanguage(), $language->getCountry()->getCode());
        }
        $s .= "</div>";
        return $s;
    }

    private function languageForm() {
        $s = sprintf("<form action='%s?function=L' method='post'>\n
                      <div class='gets'>\n
                      <h3>Create Language</h3>
                      <p>
                        Language<br/>
                        <input type='text' name='language' required/>
                      </p>\n
                      <p>
                        IsOfficial<br/>
                        <select name='isofficial' required>
                            <option value='F' selected>No</option>
                            <option value='T'>Yes</option>
                        </select>
                      </p>\n
                      <p>
                        Percentage<br/>
                        <input type='text' name='percentage' required/>
                      </p>\n
                      <p>
                        Country<br/>
                        <input type='text' name='countrycode'
                        value='%s'
                        required readonly/>
                      </p>\n
                      <p><input type='submit' name='createGo' value='Go!'/></p>
                      </div>\n
                      </form/>"
                      , $_SERVER['PHP_SELF']
                      , $this->model->getCountry()->getCode()
                      );
        return $s;
    }
    private function editLanguageForm() {
        $s = sprintf("<form action='%s?function=L' method='post'>\n
                      <div class='gets'>\n
                      <h3>Edit Language</h3>
                      <p>
                        ContryCode to Change:<br/>
                        <input type='text' name='countrycode' required/>
                      </p>\n
                      <p>
                        Language to Change:<br/>
                        <input type='text' name='language' required/>
                      </p>\n
                      <p>
                        Isofficial<br/>
                        <input type='text' name='isofficial' required/>
                      </p>\n
                      <p>
                        Percentage<br/>
                        <input type='text' name='percentage' required/>
                      </p>\n

                      <p><input type='submit' name='updateGo' value='Go!'/></p>
                      </div>\n
                      </form/>"
                      , $_SERVER['PHP_SELF']
                      );
        return $s;
    }
    private function deleteLanguageForm() {
        $s = sprintf(" <form action='%s?function=L' method='post'>\n
                          <div class='gets'>\n"
                        , $_SERVER['PHP_SELF']);

        $s .= "         <h3>Delete Language</h3>";

        $languages = CountryLanguage::retrievel($this->model->getCountry()->getCode());
        $s .= "         <select name='language'>\n";
        foreach ($languages as $language) {
            $s .=  sprintf("  <option value='%s'>%s</option>\n"
                , $language->getLanguage(), $language->getLanguage());
        }
        $s .= "          </select>\n";

        $languages = CountryLanguage::retrievel($this->model->getCountry()->getCode());
        $s .= "         <select name='countrycode'>\n";
        foreach ($languages as $language) {
            $s .=  sprintf("  <option value='%s'>%s</option>\n"
                , $language->getCountry()->getCode(), $language->getCountry()->getCode());
        }
        $s .= "          </select>\n";

        $s .= "
                          <input type='submit' name='deleteGo'>\n
                        </div>
                      </form>\n";

        return $s;
    }

    private function displayLanguage() {
        $s = sprintf("<main class='main'>\n%s\n%s\n%s\n%s</main>\n"
                    , $this->displayManyLanguages()
                    , $this->languageForm()
                    , $this->editLanguageForm()
                    , $this->deleteLanguageForm()
                    );
        return $s;
    }

    public function display(){
       $this->output($this->displayLanguage());
    }
}
