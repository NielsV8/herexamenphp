<?php 
    function canLogin($username, $password){
        $conn = new PDO("mysql:host=localhost:8889;dbname=php", "root", "root");
        $query = $conn->prepare("select * from users where username = :username");
        $query->bindValue(":username", $username);
        $query->execute();
        $result = $query->fetch();
        $hash = $result['password'];
        if(password_verify($password, $hash)){
            return true;
        } else {
            return false;
        }
    }
    if(!empty($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(canLogin($username, $password)){
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "Invalid username or password";
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