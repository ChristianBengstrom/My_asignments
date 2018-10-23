<?php
ini_set("display_errors", "On");
ERROR_REPORTING(E_ALL);
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'/>
        <style>
            h3 {
                margin-bottom: 0;
            }
            .spacer {
                margin-bottom: 1em;
            }
        </style>
        <script src='js/triangles.js'></script>
    </head>
    <!-- <body onload='drawTriangle(realestate, 0, 10, 0, 20, 15, 15);'> -->
    <body>
        <h3>Triangular Code</h3>
        <div class='spacer' id='realestate'></div>

        <div id="insert"></div>
<?php
        if (isset($_POST['subm'])) {
            foreach ($_POST as $key => $val) {
                $$key = $val;
            }

            printf("D: (%s,%s)<br/>\n", $x1, $y1);
            printf("E: (%s,%s)<br/>\n", $x2, $y2);
            printf("F: (%s,%s)<br/>\n", $x3, $y3);

            // given coordinate sets xn,yn you must
            // calculate and print the angles in degrees
            // and the area of the triangle in this div

            // your code goes here
            require_once 'includes/solution.inc.php';

            printf("<script>drawTriangle('realestate', %s, %s, %s, %s, %s, %s);</script>\n",
                $x1, $y1, $x2, $y2, $x3, $y3);
        }

?>

        <div class='spacer'></div>



        <form method="post"
              action="<?php echo $_SERVER['PHP_SELF'];?>">
            <table>
                <tr>
                    <td>x1</td><td>y1</td><td>x2</td><td>y2</td><td>x3</td><td>y3</td>
                </tr>
                <tr>
                    <td><input type='text' name='x1' size='4'/></td>
                    <td><input type='text' name='y1' size='4'/></td>
                    <td><input type='text' name='x2' size='4'/></td>
                    <td><input type='text' name='y2' size='4'/></td>
                    <td><input type='text' name='x3' size='4'/></td>
                    <td><input type='text' name='y3' size='4'/></td>
                    <td><input type='submit' name='subm' value='Go!'/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
