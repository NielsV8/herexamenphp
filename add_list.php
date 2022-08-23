<?php
    include_once(__DIR__ ."/Classes/User.php");
    include_once(__DIR__ ."/Classes/List.php");

    if(!empty($_POST)){
        try{
            $list = new DoList();
            $list->setTitle($_POST["title"]);
            $list->save();
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add List</title>
</head>
<body>
    <form action="" method="post">
        <div class="signup">
            <input type="text" id="title" name="title">
        </div>
        <button type="submit" class="btn">Add List</button>
    </form>
</body>
</html>