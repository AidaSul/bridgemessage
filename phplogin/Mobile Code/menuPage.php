<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();


}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!The title of the page>
    <title>Home Page</title>
    <!This is the link to the css for this HTML page>
    <link href="menuPage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
    <!The part of the page deals with the top bar of the page>
    <nav class="navtop">
        <div>
            <!The first title of the page>
            <h1>Bridge Messenger</h1>
            <!This button takes the user to the profile page>
            <a href="profile.php"><button class= "button profileBtn"><i class="fas fa-user-circle"></i>Profile</button></a>
            <!This button logs the user out of the app>
            <a href="logoutPage.php"><button class = "button logoutBtn"><i class="fas fa-sign-out-alt"></i>Logout</button></a>
        </div>
    </nav>
    <!The part of the page that deals with the rest of the page>
    <div class="content">
        <!This title welcomes back the user by their username>
        <h2>Welcome back,
            <?=$_SESSION['name']?>!</h2>
        <!This button takes the user to the group chat's feed page>
        <button class="button button1" id="GC Button" onclick="window.location='feed.php';"> Group Chat </button>
        <!This button takes the user to the options page where the user can choose if they want to create a new game or see existing games>
        <button class="button button2" id="Games Button" onclick="window.location='gamesOptionsPage.html';"> Games </button>
        <!This button takes the user to the notification page so the user and select the tyoe of alerts they want>
        <button class="button button3" id="Notif Button" onclick="window.location='notificationPage.html';"> Notifications</button>
    </div>
</body>

</html>

