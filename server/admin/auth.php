<?php

session_start();

$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "user";
$DB_NAME = "appbdp";

// connect to PDO
try {
    $pdo = new PDO("mysql:host=" . $DB_SERVER . ";dbname=" . $DB_NAME, $DB_USERNAME, $DB_PASSWORD);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

if (!isset($_POST['username'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}

if ($stmt = $pdo->prepare('SELECT username, password FROM accounts WHERE username = ? AND password = ?')) {
    //$stmt->bindParam(':username', $_POST['username']);
    $stmt->execute([$_POST['username'], $_POST['password']]);
}
if ($stmt->rowCount() === 0) {
    // No user exists with that username

    exit('Incorrect username or password!');
} else {
    $row = $stmt->fetch();
    // We have a match, now check the password

    if ($_POST['password'] === $row['password'] && $_POST['username'] === $row['username']) {
        // Identifiants correct
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
        // XSS protection as we might print this value
        $user_id = preg_replace("/[^0-9]+/", "", $row['username']);
        $_SESSION['username'] = $row['username'];
        $_SESSION['login_string'] = hash('sha512', $row['password'] . $user_browser);
        // Login successful.
        header('Location: ../admin/adminHome.php');
        exit();
    } else {
        // Password is not correct
        exit('Incorrect password!');
    }
}

