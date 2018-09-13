<?php
    require_once './inc/Vehicle.inc.php';
    require_once './inc/Truck.inc.php';
    require_once './inc/Bicycle.inc.php';
    require_once './inc/Car.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BE.3.0 Inheritance</title>
        <link rel="stylesheet" href="./css/styles.css"/>
    </head>
    <body>
<?php
    $v1 = new Vehicle('Suzuki', 'Silver', 'Alice');
    printf("<p>%s</p>\n", $v1);

    $v2 = new Truck('Scania', 'Red', 'Otto', 18);
    printf("<p>%s</p>\n", $v2);

    $v3 = new Bicycle('Moser', 'Blue', 'Francesco');
    printf("<p>%s</p>\n", $v3);

    $v4 = new Car('Tesla', 'Black', 'Batman', 4, FALSE);
    printf("<p>%s</p>\n", $v4);
?>
    </body>
</html>
