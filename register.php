<?php 
    if(!empty($_POST)){
        $username = $_POST['username'];
        $options = [
            'cost' => 12,
        ];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
// OKEY
        $conn = new PDO("mysql:host=localhost:8889;dbname=php", "root", "root");
        $query = $conn->prepare("insert into users (username, password) values (:username, :password)");
        $query->bindValue(":username", $username);
        $query->bindValue(":password", $password);
        $query->execute();
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
        <button type="submit" class="btn">Sign In</button>
    </form>
</body>
</html>