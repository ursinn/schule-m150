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
<h1>Konto 1050: Warenbestand</h1>
<table style="padding: 0">
    <tr>
        <th>Datum</th>
        <th>Gegenkonto</th>
        <th>Text</th>
        <th>Soll</th>
        <th>Haben</th>
    </tr>
    <?php
    $res = mysqli_query($con, "SELECT * FROM `transaction` WHERE `account_1` = '1050' OR `account_2` = '1050' ");

    for ($i = 0; $i < mysqli_num_rows($res); $i++) {
        $data = mysqli_fetch_assoc($res);
        $date = $data['date'];
        $acc_1 = $data['account_1'];
        $acc_2 = $data['account_2'];
        $desc = $data['description'];
        $amount = $data['amount'];
        $type = $data['type'];

        if ($acc_1 == $acc_2) continue;

        echo "<tr>";
        echo "<td>$date</td>";
        echo "<td>$acc_2</td>";
        echo "<td>$desc</td>";
        if ($type == 1)
            echo "<td style='text-align: right'>$amount</td>";
        else
            echo "<td>&nbsp;</td>";
        if ($type == 2)
            echo "<td style='text-align: right'>$amount</td>";
        else
            echo "<td>&nbsp;</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
require '../template/footer.php';
?>