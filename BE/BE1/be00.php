<?php
ini_set("display_errors", "On");
ERROR_REPORTING(E_ALL);

// creating matrix array
$matrix = array();

// specifies size of the matrix
$num = 5;

// Creating rows
for ($row=0; $row < $num; $row++) {

  // Filling the colums by using the array_push() function.
  for ($col=0; $col < $num; $col++) {
    if ($row == $col) {
      $bin = 1 .' ';
    } else {
      $bin = 0 .' ';
    }
    array_push($matrix, $bin);
  }
}
// var_dump($matrix);

print "<h1>Christian</h1>";
print "<h3>Assignment BE.0.0</h3>";

print "<br>";
print "Matrix size set to " . $num;
print "<br>";
print "<br>";

// setting the array's int counter
$count = 0;

// outputs the matrix - first line represents rows
for ($row=0; $row < $num; $row++) {

  // outputs colums
  for ($col=0; $col < $num; $col++) {
    echo $matrix[$count];
    $count++;
  }
  print "<br>";
}
