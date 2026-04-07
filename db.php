<?php

$host = "containers-us-west-xxx.railway.app";     // database host
$user = "root";           // database username
$password = "VsWrxEPGfswmtbMhjHhWFhXUAavIVTRs";           // database password
$database = "railway"; // database name
$port = 6543;             // mysql port

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>
