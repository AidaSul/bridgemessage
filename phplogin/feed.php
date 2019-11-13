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
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="feedFunctions.js"></script>
        <title>Bridge Chat Test</title>
    </head>
    
    <body class="loggedin">
        <nav class="navtop">
            <div>
                <a href="home.php"><i class="fas fa-home"></i>Home</a>
                <h1>Bridge Messenger</h1>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </nav>
        <div class="chat-window" id="myChat">
            
         <form action="" class="form-container">
            <h1>Bridge Chat</h1>

            <div id="chat" class="chat" style= "overflow-y: scroll; height:400px;">
                <ul id ="myList"></ul>

            </div>
            
            <label for="msg"><b>Messenger</b></label>
            <textarea placeholder="Write a message.." id="msg" required></textarea>

            <input type="button" class="btn" value = "Send" onclick = "display()">
     
            <button type = "button" id="FeedBackButton" onclick="window.location='frontPage.html';"> Back </button>
            
        </form>
            
        </div>
        
        
    </body>
</html>
