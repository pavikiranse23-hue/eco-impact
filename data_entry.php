<?php
session_start();
include 'db.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['department'])){
    $d=$_POST['department'];
    $e=$_POST['electricity'];
    $w=$_POST['water'];
    $p=$_POST['paper'];
    $ws=$_POST['waste'];

    $score=($e*0.4)+($w*0.3)+($p*0.2)+($ws*0.1);

    mysqli_query($conn,"INSERT INTO eco_data(department,electricity,water,paper,waste,eco_score)
    VALUES('$d','$e','$w','$p','$ws','$score')");

    header("Location: report.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Enter Eco Data</h2>

<form method="POST">
<input name="department" placeholder="Department" required>
<input name="electricity" type="number" placeholder="Electricity Usage" required>
<input name="water" type="number" placeholder="Water Usage" required>
<input name="paper" type="number" placeholder="Paper Usage" required>
<input name="waste" type="number" placeholder="Waste Generated" required>
<button>Save</button>
</form>

<a href="dashboard.php" style="color:white;">← Back</a>
</div>
