<?php
// objektet kan kun exixtere en gang
require 'Preferences.inc.php';

$pref = Preferences::getInstance();
$pref->setProperty('name', 'Niels');
$pref->setProperty('dbname', 'world');

unset($pref);

$prefNext = Preferences::getInstance();
printf("%s: %s<br/>%s: %s\n",
    'name', $prefNext->getProperty('name'),
    'dbname', $prefNext->getProperty('dbname'));
