<?php 
    include_once(__DIR__ ."/Classes/User.php");

    if(!empty($_POST)){
        try{
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            if(!empty($username && $password)){
                if($user->login($username, $password)){
                    session_start();
                    $_SESSION ['username'] = $user->getUsername();
                    header("location: index.php");
                }
            }
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
    <title>Register</title>
</head>
<body>
    <form action="" method="post">
        <div class="signup">
            <input type="text" id="username" name="username">
            <input type="password" id="password" name="password">
        </div>
        <button type="submit" class="btn">Log In</button>
    </form>
</body>
</html>