<?php
$json = file_get_contents('php://input');
$my_array = json_decode($json,true);
$name=$my_array['name'];
$disposition=$my_array['disposition'];
$id=$my_array['id'];

include 'db_connect.php';
$conn = OpenCon();

$res = $conn->query("UPDATE image SET name='$name', disposition='$disposition' WHERE id='$id'");

echo $id;