<?php
session_start();
session_destroy();
// Redirect to the login page:
//header('Location: index.html');
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <!The title of the page>
    <title>Logout Page</title>
    <!This is the link to the css for this HTML page>
    <link href="logoutPage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
<h1>You have been logged out</h1>
<h2>Want to log back in? Click here: </h2>
<button class="button login">Login</button>
</body>

</html>