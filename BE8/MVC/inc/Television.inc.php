<?php
/*
 * This is the MODEL
 */
  require_once './inc/db/DbP.inc.php';
  require_once './inc/db/DbH.inc.php';
  require_once './inc/Media.inc.php';

  class Television implements TelevisionI {

    private $on;      // true if on, otherwise false
    private $channel; // integer with current channel number
    private $volume;  // integer with current volume level
    private $mute;    // false if not muted, otherwise true
    private $videos = array();
    private $audio = array();

    /*
     * get state from session array
     * normally you'd read input params
     * or a database
     */
    public function __construct() {                                               // ingen parametre for konstrueringen.
        $this->on = isset($_SESSION['on']) ? $_SESSION['on'] : TRUE;              // henter fra sessionsvariablen | bruger standard værdi.
        $this->channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 1;  // ternary operator/ ternær operator
        $this->volume = isset($_SESSION['volume']) ? $_SESSION['volume'] : 10;
        $this->mute = isset($_SESSION['mute']) ? $_SESSION['mute'] : FALSE;
        $this->populateMedia($this->getChannel(), DbH::getDbH());
        // $this->populateAudio($this->getChannel(), DbH::getDbH());
    }

    public function getTvOnOff() {
      return $this->on;
    }

    public function tvOnOff() {
      $this->on = $this->on ? FALSE : TRUE; // Flip flop switch
      $this->saveState();
    }

    public function getChannel() {
      return $this->channel;
    }

    public function chUp() {
      $this->channel += 1;
      $this->saveState();
      $this->populateMedia($this->getChannel(), DbH::getDbH());
      // $this->populateAudio($this->getChannel(), DbH::getDbH());
    }

    public function chDown() {
      if ($this->channel > 1) {
          $this->channel -= 1;
      } else {
          $this->channel = 1;
      }
      $this->saveState();
      $this->populateMedia($this->getChannel(), DbH::getDbH());
      // $this->populateAudio($this->getChannel(), DbH::getDbH());
    }

    public function getVolume() {
      return $this->volume;
    }

    public function volUp() {
      $this->volume += 1;
      $this->saveState();
    }

    public function volDown() {
      $this->volume -= 1;
      $this->saveState();
    }

    public function getMute() {
      return $this->mute;
    }

    public function mute() {
      $this->mute = $this->mute ? FALSE : TRUE;
      $this->saveState();
    }

    public function getMedia() {
     return $this->videos;
    }

    private function populateMedia($ch, $db) {
      $this->videos = array();
      $this->videos = Media::setMedia($ch, $db);
    }

    // private function populateAudio($ch, $db) {
    //   $this->audio = array();
    //   $this->audio = Media::setMedia($ch, $db);
    // }

    private function saveState() {              // saves sessions in a assosiative session array med key value pairs
      $_SESSION['on'] = $this->getTvOnOff();
      $_SESSION['channel'] = $this->getChannel();
      $_SESSION['volume'] = $this->getVolume();
      $_SESSION['mute'] = $this->getMute();
    }
}
