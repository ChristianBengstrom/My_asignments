<?php
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);


    require_once './inc/Product.inc.php';
    require_once './inc/Book.inc.php';
    require_once './inc/DVD.inc.php';
    require_once './inc/LiveLecture.inc.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
    $book = new Book('IT Kommunikation', 172);
    $film = new DVD('@Adactio at AEA', '1 h 5 m');
    $ll = new LiveLecture('@Adactio at AEA'
            , '1 h 5 m'
            , 'Jeremy Keith'
            , 'Web Design Principles');
    $book->display();
    $film->display();
    $ll->display();
?>
    </body>
</html>
