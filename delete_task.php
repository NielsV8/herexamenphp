<?php
    include_once(__DIR__ ."/Database.php");
    include_once(__DIR__ ."/Classes/Task.php");

    $task_id = $_GET["task_id"];
    $task = Task::getAllById($task_id);

    if($task["user_id"] != $_SESSION["user_id"]){
        header("location: index.php");
    }

    Task::removeTask($_GET["task_id"]);
    header("location: index.php");
    ?>