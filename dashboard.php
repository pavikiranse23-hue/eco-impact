<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Eco Dashboard</h2>

<a href="data_entry.php" class="btn green">Enter Eco Data</a>
<a href="report.php" class="btn orange">View Report</a>
<a href="logout.php" class="btn red">Logout</a>
</div>
