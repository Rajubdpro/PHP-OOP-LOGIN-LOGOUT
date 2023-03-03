<?php
require'function.php';
if(isset($_SESSION['id'])){
    header('location: index.php');
}
$Register = new Register();
if(isset($_POST['submit'])){
 
    $result = $Register->registration($_POST["name"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

if($result == 1 ){
    echo"<script> alert('Registration seccessfully');</script>";
}
elseif($result == 10 ){
    echo"<script> alert('Username or Email has already taken');</script>";
}
if($result == 100 ){
    echo"<script> alert('Password does not match');</script>";
}

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form action="" method="post" autocomplete="off">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Enter your name" required><br>
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Enter your username" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email" required><br>
        <label for="password">Password:</label>
        <input type="text" name="password" placeholder="Enter your password" required><br>
        <label for="confirmpassword">Confirm password:</label>
        <input type="password" name="confirmpassword" placeholder="Confirm your password" required><br>
        <button type="submit" name="submit">Register</button>
        <br><br>
        <a href="login.php">Log In</a>
    </form>
</body>
</html>