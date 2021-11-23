<?php

// Init session
session_start();
// Validate login
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau d'administration</title>
</head>
<body>
<h1>Panneau d'administration</h1>
<h2>Dashboard <?php
    echo $_SESSION['username']; ?></h2>
<p>Welcome to the dashboard <?php
    echo $_SESSION['username']; ?></p>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
