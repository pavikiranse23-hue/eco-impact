<?php
include 'db.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
}


$error="";

if(isset($_POST['username'])){
    $u=$_POST['username'];
    $p=$_POST['password'];

    $q=mysqli_query($conn,"SELECT * FROM users WHERE username='$u' AND password='$p'");

    if(mysqli_num_rows($q)>0){
        $_SESSION['username']=$u;
        header("Location: dashboard.php");
        exit();
    } else $error="Invalid Login";
}
?>

<link rel="stylesheet" href="style.css">

<div class="card">
<h2>Eco Impact Login</h2>

<?php if($error!="") echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">
<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button>Login</button>
</form>
</div>
