<?php
$mysqli = new mysqli("localhost","root","","Todolist");

// Check connection
if ($mysqli -> connect_errno):
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
else:
//    echo "Connected successfully";
endif;


    require_once "./repositories/user.php";
    require_once "./repositories/task.php";



?>