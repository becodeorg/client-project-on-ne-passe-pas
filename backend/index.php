<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link href="https://salukimakingcode.github.io/pack/pack.css" rel="stylesheet" />
    <script src="https://salukimakingcode.github.io/pack/pack.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="description" content="Admin" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin</title>
</head>

<body id="index">
<header>
    <img src="./assets/img/Logo-onpp.png" alt="logo"/>
</header>

<main>

    <div class="log">
        <label for="login">Login :</label>
    </div>
    <div class="log">
            <input type="text" id="login" />
    </div>

    <div class="log">
        <label for="password">Password :</label>
    </div>
    <div class="log">
            <input type="password" id="password"/>
    </div>

    <div id="logIn">
        <span id="boutonLogIn">Se connecter</span>
    </div>

</main>


<script src="./assets/js/home.js"></script>
</body>

</html>