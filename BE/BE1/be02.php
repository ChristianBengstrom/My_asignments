<?php
  ini_set("display_errors", "On");
  ERROR_REPORTING(E_ALL);

  print "<h1>Christian BE02</h1>";

  if (isset($_GET['num'])) {

      $inputs = $_GET['num'];
      // print $inputs;

      $convertToArray = explode(" ",$inputs);
      // var_dump($convertToArray);

      $arrayLength = count($convertToArray);
      // print $arrayLength;

      $i=0;
      while ($i < $arrayLength) {
        print $convertToArray[$i]." ";
        $i++;
      }

      $small = min($convertToArray);
      $big = max($convertToArray);

      print "<br>The smallest number is: " .$small;

      print "<br>The smallest number is:  ".$big;

  }else{
      echo "Input is missing";
  }

?>
