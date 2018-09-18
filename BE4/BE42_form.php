<?php
    $title = "Form for Sellables";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="./css/ifdemo.css"/>
    </head>
    <body>
        <?php
            printf("<header><h1>%s</h1></header>\n", $title);            // put your code here
        ?>
        <form action="http://localhost/~nml/hitme.php" method="post">
            <table>
                <tr><td>Televisions</td>
                    <td>
                    <select name="tvs">
                        <option>42</option>
                        <option>52</option>
                        <option>58</option>
                    </select>
                </td>
                <td><input type="text" name="tvno"/></td></tr>
                <tr><td>Golf Balls</td>
                    <td>
                    <select name="gcolor">
                        <option>Lime</option>
                        <option>Yellow</option>
                        <option>Pink</option>
                        <option>White</option>
                    </select>
                </td>
                <td><input type="text" name="gno"/></td></tr>

                <tr><td>Tennisballs</td>
                    <td>
                    <select name="tcolor">
                        <option>Lime</option>
                        <option>Yellow</option>
                        <option>Pink</option>
                        <option>White</option>
                    </select>
                </td>
                <td><input type="text" name="tno"/></td></tr>

                <tr><td></td><td><input type="submit"/></td></tr>
            </table>
        </form>
    </body>
</html>
