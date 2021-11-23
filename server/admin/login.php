<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login To Your Account</title>
</head>
<body>
<div>
    <div class="login">
        <h1>Login</h1>
        <form action="auth.php" method="post">
            <label for="username"></label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password"></label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
