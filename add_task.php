<?php 
    include_once(__DIR__ ."/Classes/User.php");
    include_once(__DIR__ ."/Classes/Task.php");
    include_once(__DIR__ ."/Classes/Security.php");

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
    <link rel="stylesheet" href="css/style.css">
    <title>Add Task</title>
</head>
<body>
    <div class="layout">
        <h1>Add A Task</h1>
        <a class="back" href="index.php">Back</a>
    <form action="" method="post">
        <div class="input">
            <label for="title">Title</label>
            <input class="input-field" type="text" id="title" name="title">
            <label for="hours">Hours</label>
            <input class="input-field" type="number" id="hours" name="hours">
            <label for="deadline">Deadline</label>
            <input class="input-field" type="date" id="deadline" name="deadline">
            <input class="input-field" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
        </div>
        <button type="submit" class="btn btn-add">Add Task</button>
    </form>
    </div>
</body>
</html>