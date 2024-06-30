<?php
/* Create Task */
if (isset($_POST["createTask"]) and ($_POST["createTask"] === "submit")):
    $taskTitle = customFilter($_POST["taskTitle"]);
    $userId = customFilter($_POST["items"]);
    createTask($taskTitle, "Todo", $userId);
endif;

/* Delete Task */
if ((isset($_GET["action"])) and ($_GET["action"] === "delete") and (isset($_GET["id"]))):
    $action = customFilter($_GET["action"]);
    $id = customFilter($_GET["id"]);
    deleteTask($id);
    header("location: http://localhost/sqltrain/");
endif;

/* Update Task Status */
if (isset($_GET["action"]) and ($_GET["action"] === "update") and (isset($_GET["id"]) and (isset($_GET["status"])))):
    $action = customFilter($_GET["action"]);
    $status = customFilter($_GET["status"]);
    $id = customFilter($_GET["id"]);
    UpdateTask($id, $status);
    header("location: http://localhost/sqltrain/");
endif;

/* Create User */
if ((isset($_POST["createUser"]) and ($_POST["createUser"] === "submit"))):
    $user = customFilter($_POST["userTitle"]);
    createUser($user);
endif;

if ( isset($_POST["Signup"]) and isset($_POST["username"]) and isset($_POST["pass"]) ):
    $username = customFilter($_POST["username"]);
    $password = customFilter($_POST["pass"]);
    if(!isRegistered($username)):
        $password = hash("sha256",$password);
        $ipAddress = customFilter($_SERVER['REMOTE_ADDR']);
        $lastLogin = date('Y-m-d H:i:s');
        RegisterUser($username, $password, $lastLogin, $ipAddress);
    else:
        echo "UserName already taken";
    endif;
endif;

if ( isset($_POST["username"]) and isset($_POST["login"]) and isset($_POST["password"]) ):
    $username = customFilter($_POST["username"]);
    $password = customFilter($_POST["password"]);
    $password = hash("sha256",$password);
    $dbUser = LoginUser($username);
    $dbPassword = $dbUser["password"];
    $userId = $dbUser["id"];
    if ( $dbPassword === $password ):
        $_SESSION["loggedIn"] = true;
        $_SESSION["userId"] = $userId;
    else:
        echo "Wrong username or password";
    endif;
endif;

if(isset($_GET["logout"]) and ($_GET["logout"] === "true")):
//    session_destroy();
    $_SESSION["loggedIn"] = false;
    $_SESSION["userId"] = null;
    header("location: http://localhost/sqltrain/");
endif;

?>


