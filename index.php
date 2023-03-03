<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(!isset($_SESSION['id'])){
        header('location: login.php');
    }
    
    ?>
    <h2>Welcome <?php echo $_SESSION['id'];?></h2>

<form action="logout.php" method="post">
<button type="submit" name="logout" value="logout">Logout</button>
</form>


</body>
</html>