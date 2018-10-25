<?php
/**
 * index.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
    session_start();
    require_once './model/ModelCountry.inc.php'; // domainmodel
    require_once './model/ModelCity.inc.php'; // domainmodel
    require_once './model/ModelCountryLanguage.inc.php'; // domainmodel
    require_once './model/ModelUser.inc.php'; // domainmodel
    require_once './view/ViewCountry.inc.php';
    require_once './view/ViewCity.inc.php';
    require_once './view/ViewLanguage.inc.php';
    require_once './view/ViewUser.inc.php';
    require_once './view/ViewLogin.inc.php';
    require_once './controller/Controller.inc.php';


    $controller = new Controller($_GET);
    $controller->doSomething();

?>
