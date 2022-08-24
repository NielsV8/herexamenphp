<?php
    include_once(__DIR__ ."/Classes/Security.php");

    session_start();
    session_destroy();
    header("Location: login.php");