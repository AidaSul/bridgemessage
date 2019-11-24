<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link href="profilePage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
    <nav class="navtop">
        <div>
            <a href="menuPage.php"><button id="homeBtn"><i class="fas fa-home"></i>Home</button></a>
            <a href="logoutPage.php"><button id="logoutBtn"><i class="fas fa-sign-out-alt"></i>Logout</button></a>
            <h1>Bridge Profile Page</h1>

        </div>
    </nav>
    <div class="content">
        <div>
            <p>Your account details are below:</p>
            <span class="label username">Username:  <?=$_SESSION['name']?></span><br><br>
            <span class="label password">Password: <?=$password?></span><br><br>
            <span class="label email">Email: <?=$email?></span><br><br>

        </div>
    </div>
</body>

</html>