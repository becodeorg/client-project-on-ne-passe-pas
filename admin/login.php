<?php

$host = "localhost";
$user = "root";
$password = "user";
$db = "couvin";

session_start();

$data = mysqli_connect($host, $user, $password, $db);
if ($data == false) {
    die("Erreur de connection");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username='" . $username . "' AND password='" . $password . "'";

    $result=mysqli_query($data, $sql);

    $row=mysqli_fetch_array($result);


    // Not sure if usertype=user is needed

    // if($row["usertype"]=="user")
    // {
    //     header("location:userHome.php");
    // }

    if($row["usertype"]=="admin")
    {
        $_SESSION["username"]=$username;
        
        header("location:adminHome.php");
    }
    else
    {
        echo "Identifiants incorrects.";
    } 
}


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