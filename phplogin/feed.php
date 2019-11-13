<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$name=mysqli_real_escape_string($con,$_GET["name"]);
$text=mysqli_real_escape_string($con,$_GET["text"]);
$time=substr(str_replace("+",":",str_replace("T"," ",date(DATE_ATOM))),0,18);`




?>