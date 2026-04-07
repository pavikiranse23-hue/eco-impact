<?php
include "db.php";

/* ---------- Usage Capacity ---------- */
$max_electricity = 1500;
$max_water       = 500;
$max_paper       = 500;
$max_waste       = 500;

/* ---------- Color Function (ONLY ONCE) ---------- */
function scoreColor($value){
    if($value >= 80) return "green";
    if($value >= 50) return "orange";
    return "red";
}

/* ---------- Fetch Data ---------- */
$result = mysqli_query($conn,"SELECT * FROM eco_data ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Eco Impact Detailed Report</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{
    font-family:Arial;
    background:linear-gradient(to right,#1abc9c,#3498db);
    text-align:center;
    color:white;
}
table{
    margin:auto;
    margin-top:30px;
    border-collapse:collapse;
    width:95%;
    background:white;
    color:black;
}
th,td{
    padding:10px;
    border:1px solid #ccc;
}
th{
    background:#2ecc71;
    color:white;
}
canvas{
    margin-top:40px;
    background:white;
    padding:20px;
    border-radius:10px;
}
</style>
</head>

<body>

<h1>Eco Impact Detailed Report</h1>

<table>
<tr>
<th>Department</th>
<th>Electricity</th>
<th>Elec %</th>
<th>Water</th>
<th>Water %</th>
<th>Paper</th>
<th>Paper %</th>
<th>Waste</th>
<th>Waste %</th>
<th>Overall Score</th>
<th>Date</th>
</tr>

<?php
$labels = [];
$overall_scores = [];

while($row = mysqli_fetch_assoc($result)){

    $elec_percent  = 100 - (($row['electricity']/$max_electricity)*100);
    $water_percent = 100 - (($row['water']/$max_water)*100);
    $paper_percent = 100 - (($row['paper']/$max_paper)*100);
    $waste_percent = 100 - (($row['waste']/$max_waste)*100);

    $overall = ($elec_percent + $water_percent + $paper_percent + $waste_percent)/4;

    $labels[] = $row['department'];
    $overall_scores[] = round($overall,2);

    echo "<tr>
    <td>{$row['department']}</td>
    <td>{$row['electricity']}</td>
    <td style='color:".scoreColor($elec_percent)."'>".round($elec_percent,1)."</td>
    <td>{$row['water']}</td>
    <td style='color:".scoreColor($water_percent)."'>".round($water_percent,1)."</td>
    <td>{$row['paper']}</td>
    <td style='color:".scoreColor($paper_percent)."'>".round($paper_percent,1)."</td>
    <td>{$row['waste']}</td>
    <td style='color:".scoreColor($waste_percent)."'>".round($waste_percent,1)."</td>
    <td style='color:".scoreColor($overall)."'><b>".round($overall,2)."</b></td>
    <td>{$row['created_at']}</td>
    </tr>";
}
?>
</table>

<h2>Overall Performance Graph</h2>
<canvas id="ecoChart" width="800" height="400"></canvas>

<script>
new Chart(document.getElementById("ecoChart"), {
type: 'bar',
data: {
labels: <?= json_encode($labels) ?>,
datasets: [{
label: "Overall Score %",
data: <?= json_encode($overall_scores) ?>,
backgroundColor: "rgba(46,204,113,0.7)"
}]
},
options: {
scales: {
y: {
beginAtZero: true,
max: 100
}
}
}
});
</script>

</body>
</html>
