<?php
require_once './inc/controller/ProductC.inc.php';

$title = 'BE8.1 MVC Webshop';

$rc = new ProductC();                           // init a controller
$rc->action($_GET);



?>
