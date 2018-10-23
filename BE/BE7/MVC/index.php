<?php
    /*
     * This is the application
     */
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);
    session_start();
    require_once './inc/TelevisionI.inc.php';
    require_once './inc/Television.inc.php';   // the model
    require_once './inc/TelevisionV1.inc.php'; // a view
    require_once './inc/TelevisionRC.inc.php'; // a controller


    $title = 'Television';
?>
<!doctype html>
<html>
  <head>
    <meta charset='utf-8'/>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./css/styles.css"/>
  </head>
  <body>
<?php
    $model = new Television();          // init the model
    $rc = new TelevisionRC($model);     // init a controller
    $view1 = new TelevisionV1($model);  // init a view
    if (isset($_POST)) {                // did we receive data?
        $rc->action($_POST);            // the controller deals with it
    }
    printf("%s\n", $view1->osd());      // use the view, display state
    printf("%s\n", $view1->remote());   // use the view, display form
?>
  </body>
</html>
