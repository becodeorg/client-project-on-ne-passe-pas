<?php

$host="localhost";
$user="root";
$password="user";
$db="couvin";

$data=mysqli_connect()
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
<h1>Connection</h1>

    <form action="#" method="POST">
        <div class="user">
        <label>Utilisateur</label>
        <input type="text" name="username" required>    
        </div>
        <div class="mdp">
        <label>Mot de passe</label>
        <input type="password" name="password" required>
        </div>
        <div class="submit">
        <input type="submit" value="login">
        </div>

    </form>
</body>
</html>