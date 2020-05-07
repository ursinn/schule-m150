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

if(isset($_POST['name'])) {
    $name = htmlentities(htmlspecialchars($_POST['name']));
    $pw = htmlentities(htmlspecialchars($_POST['pw']));
    $name = mysqli_real_escape_string($con, $name);
    $pw = mysqli_real_escape_string($con, $pw);

    if (!empty($name) && !empty($pw)) {
        $hash = "";
        $res = mysqli_query($con, "SELECT password FROM `user` WHERE `username` = '$name'");
        $num = mysqli_num_rows($res);
        if ($num > 0) {
            $data = mysqli_fetch_assoc($res);
            $hash = $data['password'];
        }

        $ok = password_verify($pw, $hash);

        if ($ok) {
            $_SESSION['login'] = true;
            header('Location: /index.php');
        } else
            echo "Name oder Passwort ist falsch!";
    } else {
        echo "Login Error";
    }
    mysqli_close($con);
}

if (!isset($_SESSION['login'])) {
    ?>
    <!-- Inhalt -->
    <h1>Login</h1>
    <form method="post">
        <label for="name">
            Username
        </label>
        <input type="text" name="name" id="name" autofocus required>
        <label for="pw">
            Password
        </label>
        <input type="password" name="pw" id="pw" required>
        <input type="submit" value="Login">
    </form>
    <?php
} else {
    echo "Already Logged In!";
}

require '../template/footer.php';
?>