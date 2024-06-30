<?php
$query = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) auto_increment NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    ip_address VARCHAR(15) NOT NULL,
    lastlogin datetime NOT NULL,
    firstname VARCHAR(255) NULL,
    lastname VARCHAR(255) NULL,
    PRIMARY KEY(id)
    )";

function CreateUser($username) {

    global $mysqli;
    $query = "INSERT INTO Users (username) VALUES ('{$username}')";
    $result = $mysqli->query($query);
    if ($result) {
        echo "Join new User!";
    }
}

function GetAllUser(){
    global $mysqli;
    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = $mysqli->query($query);
    $result = $result -> fetch_all(MYSQLI_ASSOC);
    return $result;

}

function DeleteUser($userId){
    global $mysqli;
    $query = "DELETE FROM users WHERE id = {$userId}";
    $result = $mysqli->query($query);
    return $result;
}

function RegisterUser($username, $password, $lastLogin, $ipAddress){
    global $mysqli;
    $query = "INSERT INTO Users (username, password, lastlogin, ip_address) VALUES ('{$username}', '{$password}', '{$lastLogin}', '{$ipAddress}')";
    $result = $mysqli->query($query);
    return $result;
}
function LoginUser($username){
    global $mysqli;
    $query = "SELECT id, password FROM Users WHERE username = '{$username}'" ;
    $result = $mysqli->query($query);
    $result = $result -> fetch_assoc();
    return $result;
}
LoginUser("ali.mazandarani");
function isRegistered($username){
    global $mysqli;
    $query = "SELECT COUNT(*) FROM Users WHERE username = '{$username}'";
    $result = $mysqli->query($query);
    $result = $result -> fetch_assoc();
    if ($result ["COUNT(*)"] === "1"):
        return true;
    else:
        return false;
    endif;
}

function GetUser($userId){
    global $mysqli;
    $query = "SELECT username, ip_address, lastlogin FROM Users WHERE id = {$userId}";
    $result = $mysqli->query($query);
    $result = $result -> fetch_assoc();
    return $result;
}



$mysqli->query($query);



