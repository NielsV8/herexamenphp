<?php 
    include_once(__DIR__ ."/Classes/User.php");
    include_once(__DIR__ ."/Classes/Security.php");

    if(!empty($_POST)){
        try{
            $user = new User();
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            $user->register();
            session_start();
            $_SESSION ['username'] = $user->getUsername();
            header("location: index.php");
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="layout">
    <h1 class="addit">Register</h1>
    <p class="addit">Add-It makes keeping track of your habits and tasks way easier.<br> Join now to get started!</p>
    <form action="" method="post">
        <div class="input">
            <label for="username">Username</label>
            <input type="text" id="username" class="input-field" name="username">
            <label for="password">Password</label>
            <input type="password" id="password" class="input-field" name="password">
        </div>
        <button type="submit" class="btn">Sign In</button>
    </form>
    <form action="login.php">
        <button type="submit" class="btn">Log In</button>  
    </form>
    </div>
</body>
</html>