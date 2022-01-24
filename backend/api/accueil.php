<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
include '../assets/php/db_connect.php';
$conn = OpenCon();
$res = $conn->query("SELECT link_image FROM host_link");
$row = $res->fetch_assoc();
$link = $row['link_image'];

$res = $conn->query("SELECT i.url FROM accueil a, image i WHERE a.image_id=i.id");
$row = $res->fetch_assoc();
$url = $row ['url'];

$linkToSend = $link.$url;

echo "[";
    echo "{";
    echo "\"image\":\"".utf8_encode($linkToSend)."\"";
    echo "}";
echo "]";
CloseCon($conn);