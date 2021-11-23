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
    $stmt->execute();
}
if ($stmt->rowCount() === 0) {
    // No user exists with that username
    exit('Incorrect username or password!');
} else {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
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





// Process form when post submit
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    // Sanitize POST
//    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//
//    // Put post vars in regular vars
//    $username = trim($_POST['username']);
//    $password = trim($_POST['password']);
//
//    // Validate email
//    if (empty($username)) {
//        $username_err = 'Please enter username';
//    }
//
//    // Validate password
//    if (empty($password)) {
//        $password_err = 'Please enter password';
//    }
//
//    // Make sure errors are empty
//    if (empty($username_err) && empty($password_err)) {
//        // Prepare query
//        $sql = 'SELECT username, password FROM accounts WHERE username = :username';
//
//        // Prepare statement
//
//        if ($stmt = $this->db->prepare($sql)) {
//            // Bind params
//            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//
//            // Attempt execute
//            if ($stmt->execute()) {
//                // Check if email exists
//                if ($stmt->rowCount() === 1) {
//                    if ($row = $stmt->fetch()) {
//                        $hashed_password = $row['password'];
//                        if (password_verify($password, $hashed_password)) {
//                            // SUCCESSFUL LOGIN
//                            session_start();
//                            //$_SESSION['email'] = $email;
//                            $_SESSION['username'] = $row['username'];
//                            header('location: adminHome.php');
//                        } else {
//                            // Display wrong password message
//                            $password_err = 'The password you entered is not valid';
//                        }
//                    }
//                } else {
//                    $username_err = 'No account found for that username';
//                }
//            } else {
//                die('Something went wrong');
//            }
//        }
//        // Close statement
//        unset($stmt);
//    }
//
//    // Close connection
//    unset($pdo);
//}
