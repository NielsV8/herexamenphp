<?php
    include_once(__DIR__ ."/Classes/Task.php");
    include_once(__DIR__ ."/Classes/User.php");
    include_once(__DIR__ ."/Classes/Security.php");

    $task_id = $_GET["id"];
    $tasks = Task::getAllById($task_id);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Task</title>
</head>
<body>
    <div class="layout">
    <a class="back" href="index.php">Back</a>

    <?php if(!empty($tasks)): ?>
    <?php foreach($tasks as $task): ?>
            <h1><?php echo $task['title']; ?></h1>
            <p>Title: <?php echo $task['title']; ?></p>
            <p>Hours: <?php echo $task['hours']; ?></p>
            <p>Deadline: <?php echo $task['deadline']; ?></p>
            <input type="submit" value="Delete Task" name="delete" id="delete" class="btn">
    <?php endforeach; ?>
    <?php endif ?>
    </div>
</body>
</html>