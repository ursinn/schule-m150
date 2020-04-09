<?php
/**
 * This is free and unencumbered software released into the public domain.
 *
 * Anyone is free to copy, modify, publish, use, compile, sell, or
 * distribute this software, either in source code form or as a compiled
 * binary, for any purpose, commercial or non-commercial, and by any
 * means.
 *
 * In jurisdictions that recognize copyright laws, the author or authors
 * of this software dedicate any and all copyright interest in the
 * software to the public domain. We make this dedication for the benefit
 * of the public at large and to the detriment of our heirs and
 * successors. We intend this dedication to be an overt act of
 * relinquishment in perpetuity of all present and future rights to this
 * software under copyright law.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
 * OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * For more information, please refer to <http://unlicense.org>
 */

require '../template/header.php';
require '../db.php';
?>

    <!-- Inhalt -->
    <h1>Kontenplan</h1>
    <h3>Aktiven/Passiven</h3>
    <table style="padding: 0">
        <tr>
            <th>Nr.</th>
            <th>Bezeichung</th>
            <th style="text-align: right">Saldo</th>
            <th style="text-align: right">Saldo</th>
        </tr>
        <?php
        $res = mysqli_query($con, "SELECT `id`, `description` FROM `account` WHERE `cat` = '1'");

        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $data = mysqli_fetch_assoc($res);
            $nr = $data['id'];
            $desc = $data['description'];
            echo "<tr>";
            echo "<td><a href='account_$nr.php'>$nr</a></td>";
            echo "<td>$desc</td>";
            $res2 = mysqli_query($con, "SELECT sum(`amount`) as a FROM `transaction` WHERE `account_1` = '$nr' AND `account_2` != '$nr'");
            if (mysqli_num_rows($res2) == 1) {
                $data2 = mysqli_fetch_assoc($res2);
                echo "<td>" . $data2['a'] . "</td>";
            } else
                echo "<td>&nbsp;</td>";
            $res2 = mysqli_query($con, "SELECT sum(`amount`) as a FROM `transaction` WHERE `account_2` = '$nr' AND `account_1` != '$nr'");
            if (mysqli_num_rows($res2) == 1) {
                $data2 = mysqli_fetch_assoc($res2);
                echo "<td>" . $data2['a'] . "</td>";
            } else
                echo "<td>&nbsp;</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <h3>Aufwand/Ertrag</h3>
    <table style="padding: 0">
        <tr>
            <th>Nr.</th>
            <th>Bezeichung</th>
            <th style="text-align: right">Saldo</th>
            <th style="text-align: right">Saldo</th>
        </tr>
        <?php
        $res = mysqli_query($con, "SELECT `id`, `description` FROM `account` WHERE `cat` = '2'");
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $data = mysqli_fetch_assoc($res);
            $nr = $data['id'];
            $desc = $data['description'];
            echo "<tr>";
            echo "<td><a href='account_$nr.php'>$nr</a></td>";
            echo "<td>$desc</td>";
            $res2 = mysqli_query($con, "SELECT sum(`amount`) as a FROM `transaction` WHERE `account_1` = '$nr' AND `account_2` != '$nr'");
            if (mysqli_num_rows($res2) == 1) {
                $data2 = mysqli_fetch_assoc($res2);
                echo "<td>" . $data2['a'] . "</td>";
            } else
                echo "<td>&nbsp;</td>";
            $res2 = mysqli_query($con, "SELECT sum(`amount`) as a FROM `transaction` WHERE `account_2` = '$nr' AND `account_1` != '$nr'");
            if (mysqli_num_rows($res2) == 1) {
                $data2 = mysqli_fetch_assoc($res2);
                echo "<td>" . $data2['a'] . "</td>";
            } else
                echo "<td>&nbsp;</td>";
            echo "</tr>";
        }
        ?>

    </table>

<?php
require '../template/footer.php';
?>