<?php
  ini_set("display_errors", "On");
  ERROR_REPORTING(E_ALL);

  if (isset($_GET["num1"]) && !empty($_GET["num2"])&& !empty($_GET["num3"])) {

      $inputs = array($_GET["num1"], $_GET["num2"], $_GET["num3"]);

      echo max($inputs);
  }else{
      echo "Input is missing";
  }



?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BE.0.1</title>
  </head>
  <body>
    <h1>Christian</h1>
    <h3>BE.0.1</h3>

    <form class="" action="be01.php" method="get">

      <input type="number" name="num1" value="">
      <input type="number" name="num2" value="">
      <input type="number" name="num3" value="">

      <button type="submit" name="button"></button>

    </form>

  </body>
</html>
