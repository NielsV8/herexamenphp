<?php
    include_once(__DIR__ ."/Classes/User.php");
    include_once(__DIR__ ."/Classes/Task.php");
    include_once(__DIR__ ."/Classes/List.php");
    include_once(__DIR__ ."/Classes/Security.php");

    if(Security::loggedInUser()){
        $tasks = Task::getAll();
    } else {
        header("Location: login.php");
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>

<body>
<div class="layout">
    <h1>Tasks</h1>
    <p>Here you can find all of your tasks. Click on a task to see the details.</p>
    <?php if(!empty($tasks)): ?>
    <?php foreach($tasks as $task): ?>
        <a href="task.php?id=<?php echo $task['task_id'];?>" class="task"><?php echo $task['title']; ?></a>
    <?php endforeach; ?>
    <?php endif; ?>  
    <?php if(empty($tasks)): ?>
        <p>No lists</p>
    <?php endif ?>

    <a class="addtask" href="add_task.php">+</a>

    <footer class="logout">
    <a href="logout.php" class="logout">Logout</a>
    </footer>
    </div>
</body>
</html>