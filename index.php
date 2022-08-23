<?php
    include_once(__DIR__ ."/Classes/User.php");
    include_once(__DIR__ ."/Classes/Task.php");
    include_once(__DIR__ ."/Classes/List.php");

    $tasks = Task::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <?php if(!empty($tasks)): ?>
    <?php foreach($tasks as $task): ?>
        <a href="task.php?id=<?php echo $task['task_id'];?>"><?php echo $task['title']; ?></a>
    <?php endforeach; ?>
    <?php endif; ?>  
    <?php if(empty($tasks)): ?>
        <p>No lists</p>
    <?php endif ?>
    
    <form action="logout.php">
        <input type="submit" name="Log Out" id="logout">
    </form>
</body>
</html>