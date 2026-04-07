<?php

$host = "mysql.railway.internal";      // database host
$user = "root";           // database username
$password = "VsWrxEPGfswmtbMhjHhWFhXUAavIVTRs";           // database password
$database = "railway"; // database name
$port = 3306;             // mysql port

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>