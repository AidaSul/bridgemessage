<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <link href="feedPage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="feedPage.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	
    <title>Bridge Chat</title>
</head>

<body class="loggedin">
    <nav class="navtop">
        <div>
            <a href="menuPage.php"><i class="fas fa-home fa-3x"></i> <font size ="10">Home</font></a>
            <a href="profile.php"><i class="fas fa-user-circle fa-3x"></i>
                <font size="10">Profile</font>
            </a>
            <a href="logout.php"><i class="fas fa-sign-out-alt fa-3x"></i>
                <font size="10">Logout</font>
            </a>
        </div>
    </nav>
    <div class="chat-window" id="myChat">

        <form action="feedPage.php" class="form-container" method="post">
            <h1 style="text-align: center;">
                <font size="20">Bridge Chat</font>
            </h1>

            <div id="chat" class="chat" style="overflow-y: scroll; height:400px;">
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

$query = "INSERT INTO messages (name, message, msgDate) VALUES ('$name', '$_POST[msg]', '$timestamp')";
$result = mysqli_query($con,$query)
			or die ("Couldn't execute query.");
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
            <textarea placeholder="Write a message.." id="msg" name="msg" required maxlength="255"></textarea>

            <input type="submit" class="btn" value="Send" name="send" >
        </form>

    </div>


</body>

</html>