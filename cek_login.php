<?php
session_start();
include "config.php";
function filter($login)
{
    $anti_inject = stripslashes(strip_tags(htmlspecialchars($login, ENT_QUOTES)));
    return $anti_inject;
}

$username = filter($_POST['username']);
$pass = filter(MD5($_POST['password']));

$antiinject_username = mysqli_real_Escape_String($db, $username);
$antiinject_pass = mysqli_real_Escape_String($db, $pass);

if (!ctype_alnum($antiinject_username) or !ctype_alnum($antiinject_pass)) {
    include "404.php";
} else {
    if (empty($username)) {
        echo "Anda belum mengisikan Username <br>
        <a href='javascript:history.go(-1)'><b>Ulang Lagi</b></a>";
    } else if (empty($pass)) {
        echo "Anda belum mengisikan Password <br>
        <a href='javascript:history.go(-1)'><b>Ulang Lagi</b></a>";
    } else {
        if (empty($_POST['captcha'])) {
        // if (!empty($_POST['captcha'])) {
            if ($_POST['captcha'] == null) {
            // if ($_POST['captcha'] == $_SESSION['code']) {
                $login = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password ='$pass'");
                $cocok = mysqli_num_rows($login);
                $tampilkan = mysqli_fetch_array($login);

                if ($cocok > 0) {
                    session_start();
                    $_SESSION['username'] = $tampilkan['username'];
                    $_SESSION['password'] = $tampilkan['password'];
                    $_SESSION['level'] = $tampilkan['level'];

                    $id_lama = session_id();
                    session_regenerate_id();
                    $id_baru = session_id();
                    mysqli_query($db, "Update users set id_session = '$id_baru' 
                        where username = '$username'");
                    header('location:view/index.php');
                } else {
                    echo "<div><h1>Username & Password salah";
                    echo "<p><a href ='index.php'>Ulangi lagi </a></p></h1></div>";
                }
            } else {
                echo "<h1>kode yang anda masukan tidak cocok <br/>
                <a href ='index.php'>Ulangi lagi </br></a></h1>";
            }
        } else {
            //pesan jika kode capctha yang di masukan tidak cocok
            echo " <h1>Anda belum masukan kode </br>
            <a href = index.php>Ulangi lagi</a></h1></br>";
        }
    }
}
