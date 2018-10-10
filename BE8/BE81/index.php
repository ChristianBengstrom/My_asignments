<?php
    /*
     * This is the application
     http://x15.dk/webdev/site/apcs03.xhtml#assBE8M
     */
     require_once './inc/db/DbH.inc.php';
     require_once './inc/db/DbP.inc.php';
     $dbh = DbH::getDbH();

    require_once './inc/controller/ProductC.inc.php';

    $title = 'BE8.1 MVC Webshop';
    include_once './inc/header.inc.php';

    $rc = new ProductC();   // init a controller
    $rc->action($_GET);        // let it work

    include_once './inc/footer.inc.php';

?>
