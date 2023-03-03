<?php
require'function.php';
if(isset($_SESSION['id'])){
    header('location: index.php');
}
$log_in = new Login();

if(isset($_POST['submit'])){
    $result = $log_in->log_in($_POST['usernameemail'], $_POST['password']);
    if($result == 1){

$_SESSION["log_in"] = true;
$_SESSION['id'] = $log_in->idUser();

header("location: index.php");
    }elseif($result == 10){
        echo
        "<script>alert('Wrong password');</script>";
    }
    elseif($result == 100){
        echo
        "<script>alert('User Not Registred');</script>";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Log In</h2>
    <form action="" method="post" autocomplete="off">
        <label for="usernameemail">Username or Email:</label>
        <input type="text" name="usernameemail" value="" placeholder="Username or email" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" value="" placeholder="Enter your password" required><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br><br>
    <a href="registration.php">Registration</a>
</body>

</html>