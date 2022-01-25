<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
$slide=$_GET['slide'];
include '../assets/php/db_connect.php';
$conn = OpenCon();
$res = $conn->query("SELECT link_image FROM host_link");
$row = $res->fetch_assoc();
$link = $row['link_image'];

$res = $conn->query("SELECT i.url, i.disposition, text_fr, text_en, text_nl, question_fr, reponse1_fr, reponse2_fr, reponse3_fr, reponse4_fr,
        question_en, reponse1_en, reponse2_en, reponse3_en, reponse4_en, question_nl, reponse1_nl, reponse2_nl, reponse3_nl, reponse4_nl FROM slide s, image i WHERE s.image_id=i.id AND s.id='$slide'");
$row = $res->fetch_assoc();
$url = $row ['url'];

$linkToSend = $link.$url;

echo "[";
echo "{";
echo "\"image\":\"".utf8_encode($linkToSend)."\",";
echo "\"disposition\":\"".utf8_encode($row['disposition'])."\",";
echo "\"text_fr\":\"".$row['text_fr']."\",";
echo "\"text_en\":\"".$row['text_en']."\",";
echo "\"text_nl\":\"".$row['text_nl']."\",";
echo "\"question_fr\":\"".$row['question_fr']."\",";
echo "\"reponse1_fr\":\"".$row['reponse1_fr']."\",";
echo "\"reponse2_fr\":\"".$row['reponse2_fr']."\",";
echo "\"reponse3_fr\":\"".$row['reponse3_fr']."\",";
echo "\"reponse4_fr\":\"".$row['reponse4_fr']."\",";
echo "\"question_en\":\"".$row['question_en']."\",";
echo "\"reponse1_en\":\"".$row['reponse1_en']."\",";
echo "\"reponse2_en\":\"".$row['reponse2_en']."\",";
echo "\"reponse3_en\":\"".$row['reponse3_en']."\",";
echo "\"reponse4_en\":\"".$row['reponse4_en']."\",";
echo "\"question_nl\":\"".$row['question_nl']."\",";
echo "\"reponse1_nl\":\"".$row['reponse1_nl']."\",";
echo "\"reponse2_nl\":\"".$row['reponse2_nl']."\",";
echo "\"reponse3_nl\":\"".$row['reponse3_nl']."\",";
echo "\"reponse4_nl\":\"".$row['reponse4_nl']."\"";
echo "}";
echo "]";
CloseCon($conn);
