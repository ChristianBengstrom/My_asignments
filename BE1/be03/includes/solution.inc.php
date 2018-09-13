<?php
// 
//
// class Triangle {
//     public $x1;      // int
//     public $y1;      // int
//     public $x2;      // int
//     public $y2;      // int
//     public $x3;      // int
//     public $y3;      // int
//     public $a;      // int
//
//
//     /*
//      * Constructor function
//      * User calls it to create object
//      * initial state from params
//      */
//     public function __construct($x1,$y1,$x2,$y2,$x3,$y3) {
//       $this->x1 = $x1;
//       $this->y1 = $y1;
//
//       $this->x2 = $x2;
//       $this->y2 = $y2;
//
//       $this->x3 = $x3;
//       $this->y3 = $y3;
//     }
//
//     public function calcSidesLength() {
//
//           echo $this->x1; // hvorfor kan jeg ikke bruge objektets egenskaber her?
//
//           // c2 = (xA − xB)2 + (yA − yB)2
//           $a = sqrt(pow(($this->x1 - $this->x2),2) + pow(($this->y1 - $this->y2),2));
//
//           return $this->a;
//         }
//
//         public function geta() {
//           return $this->$a;
//         }
// }
//
// $tri = new Triangle($x1,$y1,$x2,$y2,$x3,$y3);
// // print_r($tri); // test/debug objekt
// // echo "<br>";
// //
// print $tri->calcSidesLength();


// Length of sides a b and c.

// a2 = (xA − xB)2 + (yA − yB)2
$a = sqrt(pow(($x1 - $x2),2) + pow(($y1 - $y2),2));
$b = sqrt(pow(($x2 - $x3),2) + pow(($y2 - $y3),2));
$c = sqrt(pow(($x3 - $x1),2) + pow(($y3 - $y1),2));

print "<br>";
print "The length of a is = " .$a."<br>";
print "The length of b is = " .$b."<br>";
print "The length of c is = " .$c."<br>";


// Angles

// cos C = (a2 + b2 - c2) / (2ab)
$cosC = rad2deg(acos((pow($a,2) + pow($b,2) - pow($c,2)) / (2*$a*$b)));

// sin(B)=(b x sin(C))/c
$sinB = rad2deg(asin(($b * sin(deg2rad($cosC))) / $c));

// sin(A)=(a x sin(B))/b
$sinA = rad2deg(asin(($a * sin(deg2rad($sinB))) / $b));

print "<br>The angle of C is = " .$cosC;
print "<br>The angle of B is = " .$sinB;
print "<br>The angle of A is = " .$sinA;

// Area

//area2 = (((a / 2)2 + c2) *a) / 2
$area = (sqrt(pow(($a / 2),2) + pow($c,2)) * $a) / 2;

print "<br><br>The area of the triangle is = " .$area;
