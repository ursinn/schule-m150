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
    <tr>
        <td><a href="account_1000.php">1000</a></td>
        <td>Kasse</td>
        <td style="text-align: right">1340.00</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><a href="account_1050.php">1050</td>
        <td>Warenbestand</td>
        <td style="text-align: right">230.00</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><a href="account_2100.php">2100</td>
        <td>Eigenkapital</td>
        <td>&nbsp;</td>
        <td style="text-align: right">1000.00</td>
    </tr>
</table>
<h3>Aufwand/Ertrag</h3>
<table style="padding: 0">
    <tr>
        <th>Nr.</th>
        <th>Bezeichung</th>
        <th style="text-align: right">Saldo</th>
        <th style="text-align: right">Saldo</th>
    </tr>
    <tr>
        <td><a href="account_3000.php">3000</td>
        <td>Warenertrag</td>
        <td>&nbsp;</td>
        <td style="text-align: right">1140.00</td>
    </tr>
    <tr>
        <td><a href="account_4000.php">4000</td>
        <td>Warenaufwand</td>
        <td style="text-align: right">1030.00</td>
        <td>&nbsp;</td>
    </tr>
</table>

<?php
require '../template/footer.php';
?>