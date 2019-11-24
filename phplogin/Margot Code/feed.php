<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/jquery.mobile-1.3.1.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
  
        <script src="scripts/jquery-1.8.3.min.js"></script>
        <script src="scripts/chromeFileProtocolFix.js"></script>
        <script src="scripts/jquery.mobile-1.3.1.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
          
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Bridge Chat</title>
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
    <form action="feed.php" method="post">
            <h1>Bridge Chat</h1>
<script>
$(document).ready(function(){
setInterval(function() {
$("#chat").load("feed.php #chat");
}, 10000);
});
</script>
<style>
.chat
{
font-size: 30px
}
</style>
            <div id="chat" class="chat" style= "overflow-y: scroll; height:350px;" onload="scrollToBottom()">
<?Php
//connection info
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'group1';
$DATABASE_PASS = 'onceSLEEP29';
$DATABASE_NAME = 'group1';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
// If there is an error with the connection, stop the script and display the error.
die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
header('Location: index.html');
exit();


}
$timestamp = date('H:i');
$name = $_SESSION['name'];
if (empty($_POST[msg])){
}else
{

$query = "INSERT INTO messages (name, message, msgDate) VALUES ('$name', '$_POST[msg]', '$timestamp')";
//if (isset(S_POST['send'])){
$result = mysqli_query($con,$query)
or die ("Couldn't execute query."); 
}

//header("location: feed.php");
//ORDER BY id DESC
$r = mysqli_query($con,"SELECT * FROM messages ORDER BY id DESC");
while($row = mysqli_fetch_array($r))
{
if ($row['message'] != ""){

echo $row['name'];
echo " | ";
echo $row['message'];
echo " ";
echo $row['msgDate'];
echo "<br>";
echo "<br>";
}
}



$con->close();
?>
</div>
            
            <label for="msg"><b>Messenger</b></label>
            <textarea placeholder="Write a message.." id="msg" name="msg" required maxlength = 255></textarea>

            <input type="submit" class="btn" value = "Send" name "send">
     	</form>
        <button type = "button" id="FeedBackButton" onclick="window.location='home.php';"> Back </button>
    </div>
</body>
</html>