<?php 
    include_once(__DIR__ ."/Classes/User.php");
    include_once(__DIR__ ."/Classes/Task.php");

    if(!empty($_POST)){
        try{
            $task = new Task();
            $task->setTitle($_POST['title']);
            $task->setHours($_POST['hours']);
            $task->setDeadline($_POST['deadline']);
            $task->save();
            var_dump($task);
            //header("location: index.php");
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
    <title>Add Task</title>
</head>
<body>
    <form action="" method="post">
        <div class="signup">
            <input type="text" id="title" name="title">
            <input type="number" id="hours" name="hours">
            <input type="date" id="deadline" name="deadline">
        </div>
        <button type="submit" class="btn">Add Task</button>
    </form>
</body>
</html>