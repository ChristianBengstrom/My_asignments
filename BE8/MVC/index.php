<?php
    /*
     * This is the application
     */
    session_start();
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);
    require_once './inc/TelevisionRC.inc.php'; // a controller
    $title = 'Television MVC II';
    include_once './inc/header.inc.php';

    $title = 'Television MVC II';
    include_once './inc/header.inc.php';

    $rc = new TelevisionRC();   // init a controller
    $rc->action($_POST);        // let it work

    include_once './inc/footer.inc.php';

?>
