<?php
    /*
     * This is the application
     */
    session_start();
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);

?>
<!doctype html>
<html>
  <head>
    <meta charset='utf-8'/>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./css/styles.css"/>
  </head>
  <body>
