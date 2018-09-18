<?php

// objektet kan kun exixtere en gang
class Preferences {
    private $props = array();
    private static $instance; // static!

    private function __construct () {}

    public static function getInstance () { // skal bruge :: hvis man kalder en static function
        if (empty(self::$instance)) { // hvis static var instance er tom
            self::$instance = new Preferences(); // vælg static var instance og kør privat constructor Preferences()
        }
        return self::$instance;
    }

    public function setProperty ($key, $value) {
        $this->props[$key] = $value;
    }

    public function getProperty ($key) {
        return $this->props[$key];
    }
}
