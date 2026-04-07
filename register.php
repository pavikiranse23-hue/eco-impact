<?php
include 'db.php';

if(isset($_POST['register'])){
    $u=$_POST['username'];
    $p=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $e=$_POST['email'];

    mysqli_query($conn,"INSERT INTO users(username,password,email,role)
    VALUES('$u','$p','$e','user')");

    echo "Registered Successfully!";
}
?>

<form method="post">
<h2>Register</h2>
<input type="text" name="username" placeholder="Username"><br>
<input type="email" name="email" placeholder="Email"><br>
<input type="password" name="password" placeholder="Password"><br>
<button name="register">Register</button>
</form>
