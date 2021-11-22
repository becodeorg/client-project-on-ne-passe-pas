<?php
include 'includes/autoLoader.inc.php';
session_start();

//$object = new Login();
//$object->getUser();

if(isset($_POST['login'])) {
    if(empty($_POST['username']) || empty($_POST['password'])){
        $message = "All fields are required";
    } else {
        $sql = "SELECT * FROM accounts WHERE username = :username AND password = :password";
        $userRow = $this->connect()->prepare($sql);
        $userRow ->execute(
                array(
                        'username' => $_POST['username'],
                        'password' => $_POST['password']
                )
        );
        $count = $userRow->rowCount();
        if($count > 0) {
            foreach($userRow as $result) {
            $_SESSION['id'] = $result['id'];
            header('location: adminHome.php');
            }
        } else {
            $message = "Identifiants incorrects.";
        }
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
        <button type="submit" name="login">
    </div>

</form>
</body>

</html>
