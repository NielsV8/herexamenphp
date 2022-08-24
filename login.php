<?php 
    include_once(__DIR__ ."/Classes/User.php");
    include_once(__DIR__ ."/Classes/Security.php");

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
        } catch (Throwable $e){
            $e = $e->getMessage();
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="layout">
    <h1 class="addit">Log In</h1>
    <p class="addit">Add-It makes keeping track of your habits and tasks way easier.<br> Join now to get started!</p>
    <form action="" method="post">
        <div class="input">
            <label for="username">Username</label>
            <input type="text" id="username" class="input-field" name="username">
            <label for="password">Password</label>
            <input type="password" id="password" class="input-field" name="password">
        </div>
        <?php if(isset($e)): ?>
        <div class="error"><?php echo $e; ?></div>
        <?php endif; ?>
        <button type="submit" class="btn btn-login">Log In</button>
    </form>
    <a class="a-register" href="register.php">Register</a>
    </div>
</body>
</html>