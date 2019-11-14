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
    <title>Home Page</title>
    <link href="menuPage.css" rel="stylesheet" type="text/css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
  </head>
  <body class="loggedin">
    <nav class="navtop">
      <div>
        <h1>Bridge Messenger</h1>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
      </div>
    </nav>
    <div class="content">
      <h2>Welcome back, <?=$_SESSION['name']?>!</h2>
      <button class="button button1" id="GC Button" onclick="window.location='feedPage.html';"> Group Chat </button>
      <button class="button button2" id="Games Button" onclick="window.location='currentGamesPage.html';"> Games </button>
      <button class="button button3" id="Notif Button" onclick="window.location='notificationPage.html';"> Notifications
    </button>
    </div>
  </body>
</html>


