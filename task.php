<?php
    include_once(__DIR__ ."/Classes/Task.php");
    include_once(__DIR__ ."/Classes/User.php");

    $task_id = $_GET['id'];
    $tasks = Task::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<body>
    <?php foreach($tasks as $task): ?>
            <h1><?php echo $task['title']; ?></h1>
            <p><?php echo $task['hours']; ?></p>
            <p><?php echo $task['deadline']; ?></p>
    <?php endforeach; ?>
</body>
</html>