<?php
session_start();
$login=$_GET['login'];
$pass=$_GET['pass'];
include 'db_connect.php';
$conn = OpenCon();
$res = $conn->query("SELECT login, pass FROM user WHERE login='$login' AND pass='$pass'");
$row = $res->fetch_assoc();

if (empty($row['login'])) echo "notok";
else {
    echo "okgo";
    $_SESSION["login"]=$row['login'];
}
CloseCon($conn);