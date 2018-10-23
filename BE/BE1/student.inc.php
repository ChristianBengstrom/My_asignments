<?php
  ini_set("display_errors", "On");
  ERROR_REPORTING(E_ALL);


  /**
   *
   */
   // definering af klassen
  class Student {

    private $navn;
    private $fdt;
    private $lbn;
    private $adr;
    private $nat;
    private $klasse;

    // definere objekt constructoren
    public function __construct($navn,$fdt,$lbn,$adr,$nat,$klasse)
    {
      // man kan ikke hente navnet direkte ved at skrive $navn=$navn - derfor bruges this til at pege på dette objekt.
      $this->navn = $navn;
      $this->fdt = $fdt;
      $this->lbn = $lbn;
      $this->adr = $adr;
      $this->nat = $nat;
      $this->klasse = $klasse;
    }
    // functionen bruges til at hente navnet da det er PRIVAT
    public function getName() {
      return $this->navn;
    }
  }
