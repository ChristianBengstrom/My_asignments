<?php
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);
    session_start();
    require_once './inc/Authentication.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shop Front Page</title>
        <link rel='stylesheet' href='css/styles.css'/>
    </head>
    <body>
<?php
    include './inc/menu.inc.php';
?>
        <main>
        </main>
<?php
    // include './inc/footer.inc.php';
?>
    </body>
</html>
