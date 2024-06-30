<?php
global $mysqli;
$query = "CREATE TABLE IF NOT EXISTS task (
    id INT(11) auto_increment NOT NULL,
    title VARCHAR(255) NOT NULL,
    created_date date NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status enum('Todo','Doing','Done') NOT NULL DEFAULT 'Todo',
    userID INT(11) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (userID) REFERENCES users(id)
    )";

$mysqli->query($query);


function CreateTask($taskTitle, $status, $userID) {

    global $mysqli;
    $query = "INSERT INTO task (title, status, userId) VALUES ('{$taskTitle}', '{$status}','{$userID}')";
    $result = $mysqli->query($query);
    if ($result) {
        echo "New Task Created!";
    }
}
function GetAllTask(){
    global $mysqli;
    $query = "SELECT task.id, task.title, task.status, users.username FROM task LEFT JOIN users ON task.userID = users.id ORDER BY task.id DESC";
    $result = $mysqli->query($query);
    $result = $result -> fetch_all(MYSQLI_ASSOC);
//    echo "<pre>";
//    var_dump($result);
//    echo "</pre>";
    return $result;

}

function DeleteTask($id){
    global $mysqli;
    $id = customFilter($id);
    $query = "DELETE FROM task WHERE id = {$id}";
    $result = $mysqli->query($query);
    return $result;
}

function UpdateTask($id,$status){
    global $mysqli;
    $query = "UPDATE task SET status = '{$status}' WHERE id = {$id}";
    $result = $mysqli->query($query);
    return $result;
}


