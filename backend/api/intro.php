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

$res = $conn->query("SELECT image1_id, image2_id, image3_id, image4_id, image5_id, image6_id, image7_id, image8_id, image9_id, image10_id,
        text_fr, text_en, text_nl, question_fr, reponse1_fr, reponse2_fr, reponse3_fr, reponse4_fr, question_en, reponse1_en, reponse2_en, 
        reponse3_en, reponse4_en, question_nl, reponse1_nl, reponse2_nl, reponse3_nl, reponse4_nl FROM intro");
$row = $res->fetch_assoc();

$image1 = $row['image1_id'];
$image2 = $row['image2_id'];
$image3 = $row['image3_id'];
$image4 = $row['image4_id'];
$image5 = $row['image5_id'];
$image6 = $row['image6_id'];
$image7 = $row['image7_id'];
$image8 = $row['image8_id'];
$image9 = $row['image9_id'];
$image10 = $row['image10_id'];

$res = $conn->query("SELECT id, url, disposition FROM image WHERE id='$image1' OR id='$image2' OR id='$image3' 
             OR id='$image4' OR id='$image5' OR id='$image6' OR id='$image7' OR id='$image8' OR id='$image9' OR id='$image10'");
while ($donnees = $res->fetch_assoc()) {
    if ($image1==$donnees['id']) { $url1=$link.$donnees['url']; $disposition1=$donnees['disposition']; }
    if ($image2==$donnees['id']) { $url2=$link.$donnees['url']; $disposition2=$donnees['disposition']; }
    if ($image3==$donnees['id']) { $url3=$link.$donnees['url']; $disposition3=$donnees['disposition']; }
    if ($image4==$donnees['id']) { $url4=$link.$donnees['url']; $disposition4=$donnees['disposition']; }
    if ($image5==$donnees['id']) { $url5=$link.$donnees['url']; $disposition5=$donnees['disposition']; }
    if ($image6==$donnees['id']) { $url6=$link.$donnees['url']; $disposition6=$donnees['disposition']; }
    if ($image7==$donnees['id']) { $url7=$link.$donnees['url']; $disposition7=$donnees['disposition']; }
    if ($image8==$donnees['id']) { $url8=$link.$donnees['url']; $disposition8=$donnees['disposition']; }
    if ($image9==$donnees['id']) { $url9=$link.$donnees['url']; $disposition9=$donnees['disposition']; }
    if ($image10==$donnees['id']) { $url10=$link.$donnees['url']; $disposition10=$donnees['disposition']; }
}

echo "[";
echo "{";
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
echo "\"reponse4_nl\":\"".$row['reponse4_nl']."\",";
echo "\"carrousel1\": [ ";
  echo "{\"image\":\"".$url1."\",";
  echo "\"disposition\":\"".$disposition1."\"},";
  echo "{\"image\":\"".$url2."\",";
  echo "\"disposition\":\"".$disposition2."\"},";
  echo "{\"image\":\"".$url3."\",";
  echo "\"disposition\":\"".$disposition3."\"},";
  echo "{\"image\":\"".$url4."\",";
  echo "\"disposition\":\"".$disposition4."\"},";
  echo "{\"image\":\"".$url5."\",";
  echo "\"disposition\":\"".$disposition5."\"}";
echo " ],";
echo "\"carrousel2\": [ ";
echo "{\"image\":\"".$url6."\",";
echo "\"disposition\":\"".$disposition6."\"},";
echo "{\"image\":\"".$url7."\",";
echo "\"disposition\":\"".$disposition7."\"},";
echo "{\"image\":\"".$url8."\",";
echo "\"disposition\":\"".$disposition8."\"},";
echo "{\"image\":\"".$url9."\",";
echo "\"disposition\":\"".$disposition9."\"},";
echo "{\"image\":\"".$url10."\",";
echo "\"disposition\":\"".$disposition10."\"}";
echo " ]";
echo "}";
echo "]";
CloseCon($conn);
