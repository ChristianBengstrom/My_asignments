<?php
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);
    session_start();

    require_once './inc/DbP.inc.php';
    require_once './inc/DbH.inc.php';
    require_once './inc/Authentication.inc.php';
    $auth = FALSE;
    $err = '';

    if (!Authentication::isAuthenticated()
          && Authentication::areCookiesEnabled()) {
        if (isset($_POST['user']) && isset($_POST['pwd'])) {
            $auth = Authentication::authenticate($_POST['user'], $_POST['pwd']);
            if (!Authentication::isAuthenticated()) {
                $err = 'Error at login, please retry';
            }
        }
    }

    if (Authentication::isAuthenticated()) {  // am I logged on?
        header("Location: ./index.php");
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop Login</title>
        <link rel='stylesheet' href='css/styles.css'/>
    </head>
    <body>
<?php
    include './inc/menu.inc.php';
?>
        <main id="mydiv">
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <table id="login">
                <caption>Login</caption>
                <tr>
                  <td>Userid:</td><td><input type="text" name="user"/></td>
                </tr>
                <tr>
                  <td>Pwd: </td><td><input type="password" name="pwd"/></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" value="OK"/>&nbsp;&nbsp;&nbsp;
                    <input type="button" value="I Surrender"
                          onclick="window.location='./index.php'"/>
                  </td>
                </tr>
<?php
                if ($err != '') {
                  printf("<tr><td colspan='2' class='err'>%s.</td></tr>\n", $err);
                }
                if (!Authentication::areCookiesEnabled()) {
                  print("<tr><td colspan='2' class='err'>Cookies
                      from this domain must be
                      enabled before attempting login.</td></tr>");
                }
?>
          </table>
        </form>
      </main>
<?php
    // include './includes/footer.inc.php';
?>
  </body>
</html>
